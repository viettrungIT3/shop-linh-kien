<?php
defined("BASEPATH") or die("no direct scripting");

class Otp_model extends MY_Model
{
	
	private $queries = array(

		"otp_delete" => "call otp_delete(?)",

		"otp_get" => "call otp_get(?)",

		"otp_insert" => "call otp_insert(?,?)",

		"otp_check_exist" => "call otp_check_exist(?,?)",

	);

	
	public function create($data = array())
	{

		$res = $this->db->query($this->queries['otp_insert'], array(
			$data['input_user_id'],
			$data['input_otp_hash']
		));

		return $this->process_results($res)->get_results();
	}

	public function check_exist($data = array())
	{
		$res = $this->db->query($this->queries['otp_check_exist'], array(
			$data['input_user_id'],
			$data['input_otp_hash']
		));

		return $this->process_results($res)->get_results();
	}

	public function get($user_id = NULL)
	{

		$res = $this->db->query($this->queries['otp_get'], array($user_id));

		return $this->process_results($res)->get_results();
	}

	public function delete_otp($in_int_user_id = NULL)
	{
		$results = array("status" => TRUE, "message" => "", "data" => array());
		$res = $this->db->query($this->queries['otp_delete'], array($in_int_user_id));

		if ((int)$this->db->error()['code'] !== 0) :
			$results['status'] = FALSE;
			$results['message'] = $this->db->error()['message'];
		endif;

		return $results;
	}



}
