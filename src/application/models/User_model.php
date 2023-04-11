<?php
defined("BASEPATH") or die("no direct scripting");

class User_model extends MY_Model
{
	const KEY_LOGGED_IN = "logged_in";
	const KEY_LOGGED_IN_OTP = "logged_in_otp";
	private $queries = array(

		"users_login" => "call users_login(?)",

		"users_update_password" => "call users_set_password(?,?)",

		"user_create" => "call user_create(?,?,?,?)",

		"users_delete" => "call users_delete(?)",

		"users_get" => "call users_get(?)",

		"users_get_email" => "call users_get_email(?)",

	);



	public function get($in_char_email = NULL)
	{

		$res = $this->db->query($this->queries['users_get_email'], array($in_char_email));

		return $this->process_results($res)->get_results();
	}

	/*
     * @description: to check if loggedin via 2 ways auth
     * @return boolean
     * */
	public function is_authenticateByOTP()
	{
		return $this->session->userdata(self::KEY_LOGGED_IN_OTP) === '2';
	} // end of function is_authenticated



	public function get_user_info($user_id = NULL)
	{
		$res = $this->db->query($this->queries['users_get'], array($user_id));

		return $this->process_results($res)->get_results();
	}


	public function create(
		$input_user_first_name 	= NULL,
		$input_user_last_name 	= NULL,
		$input_user_login 		= NULL,
		$input_user_password	= NULL
	) {

		$res = $this->db->query($this->queries['user_create'], array(
			$input_user_first_name,
			$input_user_last_name,
			$input_user_login,
			hash_password($input_user_password)
		));

		return $this->process_results($res)->get_results();
	}



	public function users_set_password($in_user_id = NULL, $in_password = NULL)
	{
		$res = $this->db->query($this->queries['users_update_password'], array($in_user_id, md5($in_password)));
		return $this->process_results($res)->get_results();
	}


	public function delete_user($in_int_user_id = NULL)
	{
		$results = array("status" => TRUE, "message" => "", "data" => array());
		$res = $this->db->query($this->queries['users_delete'], array($in_int_user_id));

		if ((int)$this->db->error()['code'] !== 0) :
			$results['status'] = FALSE;
			$results['message'] = $this->db->error()['message'];
		endif;

		return $results;
	}

	public function authenticate($in_char_login = NULL, $in_char_password = NULL)
	{
		$this->load->model("Misc_model", "misc");

		if (NULL === $in_char_login || NULL === $in_char_password) return $this->failed("Missing login")->get_results();
		if (NULL === $in_char_password || NULL === $in_char_password) return $this->failed("Missing password")->get_results();

		$res_user = $this->get($in_char_login);

		if (!isset($res_user['status']) || !$res_user['status'] || count($res_user['data']) < 1) :
			return $this->login_failed();
		endif;


		if (hash_password($in_char_password) !== $res_user['data'][0]->password) :
			return $this->login_failed();
		endif;

		// getting the user details
		$the_user = $res_user['data'][0];


		if ((int)1 !==  (int)USE_TWO_WAY_AUTH) {
			$this->remember_this_user($res_user['data'][0]);
			$this->session->set_userdata(self::KEY_LOGGED_IN, '1');
			return $this->success("Welcome {$res_user['data'][0]->first_name}")->get_results();
		} else {
			$hash = $this->get_auto_hash();
			$res_create_otp = $this->create_otp($hash, $in_char_login, $res_user['data'][0]);

			if (isset($res_create_otp['status']) && $res_create_otp['status']) {

				$this->remember_this_user($res_user['data'][0]);
				$this->session->set_userdata(self::KEY_LOGGED_IN_OTP, '2');
				return $this->success("Welcome {$res_user['data'][0]->first_name}")
					->set("use_two_way_auth", USE_TWO_WAY_AUTH)
					->set("hash", $hash)
					->get_results();
			} else {
				return $this
					->failed($res_create_otp['error'])
					->get_results();
			}
		}
	}

	public function create_otp($input_hash = NULL, $in_char_email = NULL, $the_user = NULL)
	{

		$this->load->model("Misc_model", "misc");


		if (!file_exists(OTP_CODE_PATH)) {
			mkdir(OTP_CODE_PATH, 0777, true);
		}
		try {
			$otp = $this->misc->randomNumber(6);

			$myfile = fopen(OTP_CODE_PATH . $input_hash . ".txt", "w") or die("Unable to open file!");
			$txt = "$otp";
			fwrite($myfile, $txt);
			fclose($myfile);


			$content_otp = "<p>Hi $the_user->first_name  ! </p>
				<p>You just requested a login code. Your code is : </p>
				<p style='font-size:20px;'> $otp </p>
				<p>If you didn't request this. Please contact us for support at 1800-xxx-xxxx</p>
				<p>Thanks,</p>
				<p>Supports @ GW DEV</p>";
			$res_email = $this->misc->send_mail($in_char_email, "GW DEV - OTP", $content_otp);

			if (isset($res_email['status']) && $res_email['status']) :
				return $this
					->success()
					->get_results();
			else :
				return $this->failed("Error send Code to your mail")->get_results();
			endif;
		} catch (\Exception $e) {
			return $this
				->failed($e)
				->get_results();
		}
	}



	// functio remmeber this user
	public function remember_this_user($user_data = NULL)
	{


		if (NULL === $user_data) return false;

		$the_user = (array) $user_data;

		foreach ($the_user as $user_key => $user_value) :

			switch ($user_key):
				case "created_on":
					$user_value = date("m/d/Y", strtotime($user_value));
				default:
					$this->session->set_userdata($user_key, $user_value);
			endswitch;
		endforeach;

		return $this;
	} // end of validating function




	public function login_failed()
	{
		return $this->reset_data()->failed("Incorrect username or password")->get_results();
	}



	// function is_authenticated
	// ================================
	public function is_authenticated()
	{


		return $this->session->userdata(self::KEY_LOGGED_IN) === '1';
	} // end of function is_authenticated


	//function logout
	public function logout()
	{
		$this->session->sess_destroy();
		return $this;
	} // remove all session

	public function get_detail()
	{

		if (!$this->is_authenticated()) return NULL;

		return array(

			"user" => $this->session->userdata("user"),
			"first_name" => $this->session->userdata("first_name"),
			"last_name" => $this->session->userdata("last_name"),
			"login" => $this->session->userdata("login"),
			"id"    => $this->session->userdata("id"),
			"type"    => $this->session->userdata("type")
		); //

	} //

	public function validate_otp($input_hash = NULL, $input_otp = NULL)
	{

		if (!isset($input_otp) || empty($input_otp)) {
			return $this->failed("The otp code you entered is incorrect!")->get_results();
		}



		if (!file_exists(OTP_CODE_PATH)) {
			return $this->failed("Missing folder")->get_results();
		}

		try {
			$path = OTP_CODE_PATH . $input_hash . ".txt";

			$myfile = fopen($path, "r") or die("Unable to open file!");

			$data = fread($myfile, filesize($path));
			fclose($myfile);

			if (trim($data) == trim($input_otp)) {

				if (file_exists($path)) {
					unlink($path);
				}
				$this->session->set_userdata(self::KEY_LOGGED_IN, '1');
				return $this->success()->get_results();
			} else {
				return $this->failed("Your code is invalid. Please check your message again and make sure that the code entered matches what is in your email.")->get_results();
			}
		} catch (\Exception $e) {
			return $this->failed($e->getMessage())->get_results();
		}

		return $this->success()->get_results();
	}
}
