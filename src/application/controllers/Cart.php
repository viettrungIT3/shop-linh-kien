<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Cart_model", "cart");
        $this->load->model("Product_model", "product");
    }

    /**
     * action:      cart/create
     * method:      post
     * body:        json {}
     * description: create cart  
     * return:      object
     */
    public function create()
    {
        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();
        if (!isset($posting_data['product_id']) || NULL === $posting_data['product_id'])
            return $this->failed("Missing product id")->render_json();
        if (!isset($posting_data['price']) || NULL === $posting_data['price'])
            return $this->failed("Missing price")->render_json();
        if (!isset($posting_data['qty']) || NULL === $posting_data['qty'])
            return $this->failed("Missing quantity")->render_json();

        $res = $this->cart->create(
            $posting_data['user_id'],
            $posting_data['product_id'],
            $posting_data['price'],
            $posting_data['qty']
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Create cart fail')->set("data", [])->render_json();
        endif;

        return $this
            ->success("Create cart successful!")
            ->set("data", $res['data'])
            ->render_json();
    }
}
