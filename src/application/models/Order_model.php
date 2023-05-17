<?php
defined("BASEPATH") or die("no direct scripting");

class Order_model extends MY_Model
{

    // description: func create order
    public function create(
        $in_user_id         = NULL,
        $in_name            = NULL,
        $in_tax             = NULL,
        $in_shipping        = NULL,
        $in_total_amount    = NULL,
        $in_address         = NULL,
        $in_phone_number    = NULL


    ) {

        $res = $this->db->query("call order_create(?,?,?,?,?,?,?)", array(
            $in_user_id,
            $in_name,
            $in_tax,
            $in_shipping,
            $in_total_amount,
            $in_address,
            $in_phone_number
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func create order details
    public function createOrderDetail(
        $in_order_id    = NUll,
        $in_product_id  = NUll,
        $in_quantity    = NUll,
        $in_price       = NUll


    ) {

        $res = $this->db->query("call order_detail_create(?,?,?,?)", array(
            $in_order_id,
            $in_product_id,
            $in_quantity,
            $in_price
        ));

        // echo '<pre>'; 
        // var_dump($this->db->last_query());
        // echo '</pre>';
        // die();

        return $this->process_results($res)->get_results();
    }

    // description: func to get get order:
    public function get(
        $in_order_id = null
    )
    {
        $res = $this->db->query("call order_get(?)", array($in_order_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list order:
    public function list(
        $in_status  = NULL
    )
    {
        if ($in_status == NULL) {
            $res = $this->db->query("call order_list()", array());
        } else {
            $res = $this->db->query("call order_list_by_status(?)", array($in_status));
        }
        return $this->process_results($res)->get_results();
    }

    // description: func to get list order:
    public function listDetailByOrderId(
        $in_order_id = null
    )
    {
        $res = $this->db->query("call order_detail_list(?)", array($in_order_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list order:
    public function listDetailByUser(
        $in_user_id = null
    )
    {
        $res = $this->db->query("call order_list_by_user(?)", array($in_user_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to change status order:
    public function changeStatus(
        $in_id      = null,
        $in_status  = null
    ) {
        $res = $this->db->query("call order_change_status(?, ?)", array(
            $in_id,
            $in_status
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func to update quantity after order:
    public function ProductUpdateQtyAfterOrder(
        $in_id      = null,
        $in_qty     = null
    ) {
        $res = $this->db->query("call product_update_qty_after_order(?, ?)", array(
            $in_id,
            $in_qty
        ));
        return $this->process_results($res)->get_results();
    }
}
