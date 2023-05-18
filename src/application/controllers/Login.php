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

				if ($input_user_login !== "" && $input_user_password !== "") :

					$res = $this->user->authenticate($input_user_login, $input_user_password);

					if (isset($res['status']) && $res['status']) :

						if ($res['data'][0]->role_id != 3) {
							redirect("/admin");
						}

						if (isset($res['use_two_way_auth']) && $res['use_two_way_auth'] == (int)USE_TWO_WAY_AUTH) {
							$this->verify_authentication_otp(base_url("/verify/" . $res['data'][0]->id));
						} else {
							redirect("/dashboard");
						}

					else :
						isset($res['error']) ?  $this->set_error($res['error']) :  $this->set_error("invalid_account");
					endif;
				else :
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

	public function forgot_password()
	{
		$this->load->model("Forgot_password_hash_model", "hash");

		switch ($this->input->server("REQUEST_METHOD")):

			case "POST":
				$posting_data = $this->get_posting_data();
				$input_email = $posting_data['email'] ?? NULL;

				if ($input_email !== "") :

					$res = $this->user->get($input_email);


					if (isset($res['status']) && count($res['data']) > 0) :

						$check_hash_exist = $this->hash->get($res['data'][0]->id);

						if (isset($check_hash_exist) && count($check_hash_exist['data']) <   1) {
							$data = $res['data'][0];

							$hash_id = md5($data->id);

							$insert_hash = $this->hash->create([
								"input_user_id" => $data->id,
								"input_hash" => $hash_id
							]);

							if (isset($insert_hash["status"]) && $insert_hash["status"]) {


								$send_email = $this->send($input_email, array("first_name" => $data->first_name, "link" =>  $_ENV["BASE_URL"] . "reset-password/{$data->id}/{$hash_id}", "link_label" => "Reset Password"));

								$send_email_status = json_decode($send_email->final_output);

								if (isset($send_email_status->status) && $send_email_status->status) {

									redirect("/password-email-sent");
								} else {
									$this->set_error("Send email failed");
								}
							};
						} else {
							$this->set_error("Email has been sent, please check your inbox or spam folder.");
						}

					else :
						isset($res->errors[0]) ?  $this->set_error($res->errors[0]) :  $this->set_error("no_account");
					endif;
				else :
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

	public function send(string $input_to = NULL, $data = NULL)
	{

		if (NULL === $input_to) {
			return $this->failed("Email is required.")->render_json();
		}

		// usign this key to communicate
		$sg_api_key = $_ENV['SG_API_KEY'];

		// sendgrid template id
		$sg_id_template = $_ENV['SG_ID_TEMPLATE'];

		// sendgrid api url
		$sp_api_url = "https://api.sendgrid.com/v3/mail/send";

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

		if (FALSE === $res) :
			return $this
				->failed("Failed to send out email")
				->set("data", curl_error($ch))
				->render_json();
		endif;

		return $this->success()
			->set("message", "Email has been sent to {$sending_to}")
			->render_json();
	}

	public function password_email_sent()
	{
		$this
			->set_page_title("password_email_sent")
			->set_body_class("login-template")
			->set_main_template("password-email-sent")
			->render();
	}


	public function reset_password(int $input_id = NULL, $input_hash = NULL)
	{
		$this->load->model("Forgot_password_hash_model", "hash");


		switch ($this->input->server("REQUEST_METHOD")):
			case "POST":
				$posting = $this->input->post();

				$check_user_exist = $this->hash->get($input_id);

				if ($check_user_exist['data'][0]->hash != $input_hash) {
					$this->set_error("Incorrect data");
				} else {

					if (isset($check_user_exist['status']) && count($check_user_exist['data']) < 1) {
						$this->set_error("Incorrect data");
					} else {

						$res = $this->user->users_set_password($input_id, $posting['input_password']);

						if (isset($res['status']) && $res['status']) :

							$delete_hash = $this->hash->delete($input_id);
							if (isset($delete_hash['status']) && $delete_hash['status']) {
								redirect("/reset-password-success");
							};

						else :
							$this->set_error($res['error']);
						endif;
					}
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


	public function logout()
	{
		$this->user->logout();
		redirect("/");
	}


	public function activity_logout()
	{
		$this->user->logout();
		redirect("/");
	}


	public function verify_otp($input_id)
	{


		$posting = array();

		switch ($this->input->server("REQUEST_METHOD")):
			case "POST":
				$posting = $this->input->post();

				$otp = $posting['input_otp'];

				$res = $this->user->validate_otp($input_id, $otp);

				if (isset($res['status']) && $res['status']) :
					redirect("/");
				else :
					$this->set_error("Mã OTP không hợp lệ");
				endif;


				break;
		endswitch;

		return $this
			->set_body_class("login-otp-template")
			->set_page_title("Authentication | GW Login")
			->set_main_template("verify-otp")
			->render();
	}


	public function register()
	{
		if ($this->user->is_authenticated()) :
			$this->verify_authentication(base_url(""));
		endif;


		switch ($this->input->server("REQUEST_METHOD")):

			case "POST":
				$posting_data = $this->get_posting_data();
				$input_user_first_name = $posting_data['input_user_first_name'] ?? NULL;
				$input_user_last_name = $posting_data['input_user_last_name'] ?? NULL;
				$input_user_login = $posting_data['input_user_login'] ?? NULL;
				$input_user_password = $posting_data['input_user_password'] ?? NULL;
				$input_user_password2 = $posting_data['input_user_password2'] ?? NULL;

				if ($input_user_password != $input_user_password2) {
					$this->set_error("password_valid");
				} else if ($input_user_login !== "" && $input_user_password !== "" && $input_user_first_name !== "" && $input_user_last_name !== "") {

					$res = $this->user->create(
						$input_user_first_name,
						$input_user_last_name,
						$input_user_login,
						$input_user_password
					);

					if (isset($res['status']) && $res['status']) :

						if (isset($res['use_two_way_auth']) && $res['use_two_way_auth'] == (int)USE_TWO_WAY_AUTH) {
							$this->verify_authentication_otp(base_url("/verify/" . $res['hash']));
						} else {
							redirect("/login");
						}

					else :
						isset($res->errors[0]) ?  $this->set_error($res->errors[0]) :  $this->set_error("invalid_account");
					endif;
				} else
					$this->set_error("username_password_valid");

				break;

		endswitch;
		return  $this
			->set("timer", false)
			->set_full_layout(TRUE)
			->set_page_title("Welcome")
			->set_main_template("register")
			->render();
	}
}
