<?php
class Login extends MY_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user");
    }


	public function index()
	{		


		if ($this->user->is_authenticated()) :
			$this->verify_authentication(base_url("/dashboard"));
		endif;
		

		switch ($this->input->server("REQUEST_METHOD")):

			case "POST":
				$posting_data = $this->get_posting_data();
				$input_user_login = $posting_data['input_user_login'] ?? NULL;
				$input_user_password = $posting_data['input_user_password'] ?? NULL;

			 if($input_user_login !== "" && $input_user_password !== ""):

				$res = $this->user->authenticate($input_user_login,$input_user_password);
			
				if(isset($res['status']) && $res['status']):

					if(isset($res['use_two_way_auth']) && $res['use_two_way_auth'] == (int)USE_TWO_WAY_AUTH){
						$this->verify_authentication_otp(base_url("/verify/".$res['hash']));
                    }else{
                        redirect("/dashboard");
					}
					
                else:
                    isset($res->errors[0]) ?  $this->set_error($res->errors[0]) :  $this->set_error("invalid_account");
                endif;
			else:
					$this->set_error("username_password_valid");
			endif;
			
				break;

		endswitch;
		return  $this
			->set("timer", false)
			->set_full_layout(TRUE)
			->set_page_title("Welcome")
			->set_main_template("login")
			->render();
	}

	public function forgot_password(){
	

		switch ($this->input->server("REQUEST_METHOD")):

			case "POST":
				$posting_data = $this->get_posting_data();
				$input_email = $posting_data['email'] ?? NULL;

				if($input_email !== ""):

					$res = $this->user->get($input_email);

		
					if(isset($res['status']) && count($res['data']) > 0):

						$data = $res['data'][0];

						$hash_id = md5($data->id);

						if (!file_exists(OTP_CODE_PATH)) {
							mkdir(OTP_CODE_PATH, 0777, true);
						}

						$myfile = fopen(OTP_CODE_PATH . $hash_id . ".txt", "w") or die("Unable to open file!");
						$txt = "$data->id";
						fwrite($myfile, $txt);
						fclose($myfile);


						$send_email = $this->send($input_email,array("first_name" => $data->first_name, "link" =>  $_ENV["BASE_URL"]."reset-password/{$data->id}/{$hash_id}" , "link_label" => "Reset Password"));

						$send_email_status = json_decode($send_email->final_output);
					
						if(isset($send_email_status->status) && $send_email_status->status){
	
							redirect("/password-email-sent");
						};
						
						
					else:
						isset($res->errors[0]) ?  $this->set_error($res->errors[0]) :  $this->set_error("no_account");
					endif;
				else:
						$this->set_error("invalid_email");
				endif;
			
				break;

		endswitch;


		return $this
		->set_body_class("forgot-password-template")
		->set_page_title("Forgot Password")
		->set_main_template("forgot-password")
		->render();
	}

    public function send(string $input_to = NULL ,$data = NULL){

        if(NULL === $input_to) {
			return $this
			->failed("Missing input email")
			->render_json();
		}

        // usign this key to communicate
        $sg_api_key = $_ENV['SG_API_KEY'];

        // sendgrid template id
        $sg_id_template = $_ENV['SG_ID_TEMPLATE_FORGET_PASSWORD'];

        // sendgrid api url
        $sp_api_url="https://api.sendgrid.com/v3/mail/send";

        // sending from 
        $sending_from = $_ENV['SG_SENDING_FROM'];

        // sending to
        $sending_to = $input_to;


        $sending_data = [

            "from" => [

                "email" => $sending_from

            ], 
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" =>  $sending_to
                        ]
                    ], 

                    "dynamic_template_data" => $data
                    
                    
                ]
            ], 

            "template_id" => $sg_id_template

        ];


        $ch = curl_init($sp_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$sg_api_key}"
        ]);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sending_data));

        $res = curl_exec($ch);

		curl_close($ch);

        if(FALSE === $res):
            return $this
                        ->failed("Failed to send out email")
                        ->set("data", curl_error($ch))
                        ->render_json();
        endif;

        return $this->success()
					->set("message","Email has been sent to {$sending_to}")
                    ->render_json();

    }
	
	public function password_email_sent(){
        $this
            ->set_page_title("password_email_sent")
            ->set_body_class("login-template")
            ->set_main_template("password-email-sent")
            ->render();
    }
	

	public function reset_password(int $input_id= NULL,$input_hash = NULL){
	
		switch($this->input->server("REQUEST_METHOD")):
            case "POST":
                $posting = $this->input->post();
                // do change password
				$path = OTP_CODE_PATH.$input_hash . ".txt";

				$myfile = fopen($path, "r") or die("Unable to open file!");
	
				$data = fread($myfile, filesize($path));
				fclose($myfile);

				if(trim($data) == trim($input_id)){

					if (file_exists($path)) {
						unlink($path);
					}
					
					$res = $this->user->users_set_password($input_id,$posting['input_password']);

					if (isset($res['status']) && $res['status']) :
						redirect("/reset-password-success");
					else :
						$this
							->set_error($res['error']);
					endif;
				}else{
					$this
					->set_error("Invalid data");
				}

				
			
                break;
        endswitch;


		$this
		->set_page_title("update_password")
		->set("timer", false)
		->set_body_class("update-password-template")
		->set_main_template("update-password")
		->render();
	}


	public function logout(){
        $this->user->logout();
        redirect("/");
    }


	public function activity_logout(){
		$this->user->logout();
        redirect("/");
	}


	public function verify_otp($hash = NULL){


        $posting = array();

        switch($this->input->server("REQUEST_METHOD")):
            case "POST":
                $posting = $this->input->post();

                $otp = $posting['input_otp'];

				$res = $this->user->validate_otp($hash, $otp);

				if(isset($res['status']) && $res['status']): 
					redirect("/dashboard");
				else: 
					 $this
					->set_error($res['error']);
				endif;
		

                break;
        endswitch;

        return $this
            ->set_body_class("login-otp-template")
            ->set_page_title("Authentication | GW Login")
            ->set_main_template("verify-otp")
            ->render();

    }





}
