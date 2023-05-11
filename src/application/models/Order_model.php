<?php
defined("BASEPATH") or die("no direct scripting");

class Order_model extends MY_Model
{

    // description: func create order
    public function create(
        $in_user_id         = NULL,
        $in_tax           = NULL,
        $in_shipping        = NULL,
        $in_total_amount    = NULL

    ) {

        $res = $this->db->query("call order_create(?,?,?,?)", array(
            $in_user_id,
			$in_tax,
			$in_shipping,
			$in_total_amount
        ));
        return $this->process_results($res)->get_results();
    }

    // description: func create order details
    public function createOrderDetail(
        $in_user_id         = NULL,
        $in_tax           = NULL,
        $in_shipping        = NULL,
        $in_total_amount    = NULL

    ) {

        $res = $this->db->query("call order_detail_create(?,?,?,?)", array(
            $in_user_id,
			$in_tax,
			$in_shipping,
			$in_total_amount
        ));
        return $this->process_results($res)->get_results();
    }

}
