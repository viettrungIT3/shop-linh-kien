<?php
defined("BASEPATH") or die("no direct scripting");

class Product_model extends MY_Model
{
    // description: func to get info product
    public function get(
        $in_id              = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        $res = $this->db->query("call product_get(?)", array($in_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list product:
    public function list()
    {
        $res = $this->db->query("call product_list()", array());
        return $this->process_results($res)->get_results();
    }

    // description: func to get list product by use
    public function listByUserID(
        $in_user_id = NULL
    ) {
        $res = $this->db->query("call product_list_by_user(?)", array($in_user_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list product by status
    public function listByStatus(
        $in_status = NULL
    ) {
        $res = $this->db->query("call product_list_by_status(?)", array($in_status));
        return $this->process_results($res)->get_results();
    }

    // description: func create product
    public function create(
        $in_user_id             = NULL,
        $in_category_id         = NULL,
        $in_name                = NULL,
        $in_price               = NULL,
        $in_description         = NULL,
        $in_brand               = NULL,
        $in_warranty            = NULL,
        $in_gift_info           = NULL,
        $in_quantity            = NULL,
        $in_size                = NULL,
        $in_weight              = NULL,
        $in_special_features    = NULL
    ) {

        $res = $this->db->query("call product_create(?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $in_user_id,
            $in_category_id,
            $in_name,
            $in_price,
            $in_description,
            $in_brand,
            $in_warranty,
            $in_gift_info,
            $in_quantity,
            $in_size,
            $in_weight,
            $in_special_features
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func to update product
    public function update(
        $in_user_id         = NULL,
        $in_id              = NULL,
        $in_category_id     = NULL,
        $in_name            = NULL,
        $in_price           = NULL,
        $in_description     = NULL,
        $in_brand           = NULL,
        $in_warranty        = NULL,
        $in_gift_info       = NULL,
        $in_quantity        = NULL,
        $in_size            = NULL,
        $in_weight          = NULL,
        $in_special_features    = NULL,
        $in_status          = NULL
    ) {

        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();
        if (NULL === $in_id)        return $this->failed("Missing product id")->get_results();

        $res = $this->db->query(
            "call product_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
            array(
                $in_user_id,
                $in_id,
                $in_category_id,
                $in_name,
                $in_price,
                $in_description,
                $in_brand,
                $in_warranty,
                $in_gift_info,
                $in_quantity,
                $in_size,
                $in_weight,
                $in_special_features,
                $in_status
            )
        );

        // var_dump($this->db->last_query()); die;

        return $this->process_results($res)->get_results();
    }

    // description: func to delete test 
    public function delete(
        $in_user_id = NULL,
        $in_id      = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();

        $res = $this->db->query("call product_update_status(?,?,?)", array(
            $in_user_id,
            $in_id,
            2
        ));

        return $this->process_results($res)->get_results();
    }
}
