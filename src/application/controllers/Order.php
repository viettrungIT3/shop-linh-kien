<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Order_model", "order");
        $this->load->model("Product_model", "product");
    }

    /**
     * action:      order/create
     * method:      post
     * body:        json {}
     * description: create order  
     * return:      object
     */
    public function create()
    {
        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();


        $user_id    = $posting_data['user_id'];


        return $this
            ->success("Create order successful!")
            ->set("data", $posting_data )
            ->render_json();
    }
}
