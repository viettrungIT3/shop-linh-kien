<?php
defined("BASEPATH") or die("no direct scripting");

class Forgot_password_hash_model extends MY_Model
{
	
	private $queries = array(

		"forgot_password_check_hash_get" => "call forgot_password_check_hash(?)",

		"forgot_password_check_hash_insert" => "call forgot_password_check_hash_insert(?,?)",

		"forgot_password_check_hash_exist" => "call forgot_password_check_hash_exist(?,?)",

		"forgot_password_hash_delete" => "call forgot_password_hash_delete(?)",

	);

	
	public function create($data = array())
	{

		$res = $this->db->query($this->queries['forgot_password_check_hash_insert'], array(
			$data['input_user_id'],
			$data['input_hash']
		));

		return $this->process_results($res)->get_results();
	}



	public function get($user_id = NULL)
	{

		$res = $this->db->query($this->queries['forgot_password_check_hash_get'], array($user_id));

		return $this->process_results($res)->get_results();
	}

	public function delete($in_int_user_id = NULL)
	{
		$results = array("status" => TRUE, "message" => "", "data" => array());
		$res = $this->db->query($this->queries['forgot_password_hash_delete'], array($in_int_user_id));

		if ((int)$this->db->error()['code'] !== 0) :
			$results['status'] = FALSE;
			$results['message'] = $this->db->error()['message'];
		endif;

		return $results;
	}




}
