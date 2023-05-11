<?php
defined("BASEPATH") or die("no direct scripting");

class Cart_model extends MY_Model
{
    // description: func to get list cart:
    public function list()
    {
        $res = $this->db->query("call cart_list()", array());
        return $this->process_results($res)->get_results();
    }

    // description: func to get list cart by user
    public function listByUserId(
        $in_user_id = NULL
    ) {
        $res = $this->db->query("call cart_list_by_user(?)", array($in_user_id));

        return $this->process_results($res)->get_results();
    }

    // description: func to get list cart by user
    public function CountListByUserId(
        $in_user_id = NULL
    ) {
        $res = $this->db->query("call cart_list_by_user(?)", array($in_user_id));

        return $this->process_results($res)->get_results();
    }

    // description: func to get get cart by product id
    public function listByProductId(
        $in_product_id = NULL
    ) {
        $res = $this->db->query("call cart_list_by_product(?)", array($in_product_id));

        return $this->process_results($res)->get_results();
    }

    // description: func to get list cart by user
    public function listByUserAndProduct(
        $in_user_id = NULL,
        $in_product_id = NULL
    ) {
        $res = $this->db->query("call cart_list_by_user_and_product(?,?)", array($in_user_id, $in_product_id));

        return $this->process_results($res)->get_results();
    }

    // description: func create cart
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
        return $this->process_results($res)->get_results();
    }

    // description: func create cart
    public function update(
        $in_user_id         = NULL,
        $in_product_id      = NULL,
        $in_product_price   = NULL,
        $in_qty             = NULL

    ) {

        $res = $this->db->query("call cart_update(?,?,?,?)", array(
            $in_user_id,
            $in_product_id,
            $in_product_price,
            $in_qty
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func to delete cart by user id and product id
    public function DeleteByUserAndProduct(
        $in_user_id = NULL,
        $in_product_id = NULL
    ) {
        $res = $this->db->query("call cart_delete_by_user_and_product(?,?)", array($in_user_id, $in_product_id));

        return $this->process_results($res)->get_results();
    }
}
