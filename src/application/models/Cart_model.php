<?php
defined("BASEPATH") or die("no direct scripting");

class Cart_model extends MY_Model
{
    // description: func create category
    public function create(
        $in_user_id         = NULL,
        $in_product_id      = NULL,
        $in_product_price   = NULL,
        $in_qty             = NULL

    ) {

        $res = $this->db->query("call cart_create(?,?,?,?)", array(
            $in_user_id,
            $in_product_id,
            $in_product_price,
            $in_qty
        ));

        // echo '<pre>'; 
		// var_dump($this->db->last_query());
		// echo '</pre>';
		// die();

        return $this->process_results($res)->get_results();
    }
}
