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
     * action:      cart/list/{user_id}
     * method:      get
     * description: get list categories
     * return:      object
     */
    public function list(
        $in_user_id
    ) {

        $res = $this->cart->listByUserId($in_user_id);

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Cart is empty")->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }
    /**
     * action:      cart/list/
     * method:      get
     * description: get list categories
     * return:      object
     */
    public function listAll()
    {

        $res = $this->cart->list();

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Cart is empty")->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
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

        $user_id    = $posting_data['user_id'];
        $product_id = $posting_data['product_id'];
        $price      = $posting_data['price'];
        $qty        = $posting_data['qty'];

        $res_check = $this->cart->listByUserAndProduct($user_id, $product_id);
        if (count($res_check['data']) > 0) {
            $res = $this->cart->update(
                $user_id,
                $product_id,
                $price,
                $qty + (int)$res_check['data'][0]->qty
            );
            if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
                return $this->failed('Update cart fail')->set("data", [])->render_json();
            endif;

            return $this
                ->success("Update cart successful!")
                ->set("data", $res['data'])
                ->render_json();
        } else {
            $res = $this->cart->create(
                $user_id,
                $product_id,
                $price,
                $qty
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

    /**
     * action:      cart/delete/{user_id}/{product_id}
     * method:      get
     * description: delete cart 
     * return:      object
     */
    public function delete(
        $in_user_id     = NULL,
        $in_product_id  = NULL
    ) {

        $res = $this->cart->DeleteByUserAndProduct(
            $in_user_id,
            $in_product_id
        );

        if (false === ($res['status'] ?? FALSE)) :
            return $this->failed("Delete fail")->render_json();
        endif;

        return $this
            ->success("Delete success")->render_json();
    }
}
