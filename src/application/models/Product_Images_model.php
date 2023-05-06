<?php
defined("BASEPATH") or die("no direct scripting");

class Product_Images_model extends MY_Model
{

	// description: func create 
	public function create(
		$in_product_id			= NULL,
		$name_file				= NULL
	) {

		$res = $this->db->query("call product_images_create(?,?)", array(
			$in_product_id,
			$name_file
		));

		return $this->process_results($res)->get_results();
	}
}