<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Order_model", "order");
        $this->load->model("Product_model", "product");
        $this->load->model("Cart_model", "cart");
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

        $in_user_id        = $posting_data['user_id'];
        $in_name           = $posting_data['name'];
        $in_total_amount   = $posting_data['total_amount'];
        $in_address        = $posting_data['address'];
        $in_phone_number   = $posting_data['phone_number'];
        $in_carts          = $posting_data['carts'];

        $res = $this->order->create(
            $in_user_id,
            $in_name,
            0.05,
            0,
            $in_total_amount,
            $in_address,
            $in_phone_number
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Create order fail')->set("data", [])->render_json();
        endif;

        $order_id = $res['data'][0]->id;

        foreach ($in_carts as $cart_id) {
            $cart_info = $this->cart->get($cart_id)['data'][0];

            $res2 = $this->order->createOrderDetail(
                $order_id,
                $cart_info->product_id,
                $cart_info->qty,
                $cart_info->product_price
            );

            if (false === ($res2['status'] ?? FALSE) || 0 == count($res2['data'])) :
                return $this->failed('Create order detail fail')->set("data", [])->render_json();
            endif;

            $res3 = $this->cart->DeleteByUserAndProduct(
                $in_user_id,
                $cart_info->product_id
            );

            if (false === ($res3['status'] ?? FALSE)) :
                return $this->failed("Remove cart fail!")->render_json();
            endif;
        }

        return $this
            ->success("Create order successful!")
            ->set("data", "Create order successful!")
            ->render_json();
    }


    /**
     * action:      order/get/{id}
     * method:      get
     * description: get info product by id
     * return:      object
     */
    public function get(
        $in_id     = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing order id")->render_json();

        $order_details = $this->order->listDetailByOrderId($in_id);

        $res = $this->order->get($in_id);

        if (false === ($res['status'] ?? FALSE)) :
            return $this->failed("Not found!")->set("data", [])->render_json();
        endif;

        return $this
            ->success("Order updated successfully!")
            ->set("data", $res['data'])
            ->set("orders", $res['data'])
            ->set("order_details", $order_details['data'])
            ->set("errors", [])
            ->render_json();
    }

    /**
     * action:      order/{user_id}/change-status/{status}
     * method:      get
     * description: get info product by id
     * return:      object
     */
    public function changeStatus(
        $in_id     = NULL,
        $in_status = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing product id")->render_json();

        if ($in_status == 2) {
            $order_details = $this->order->listDetailByOrderId($in_id)['data'];
            foreach ($order_details as $item) {
                $res_u = $this->order->ProductUpdateQtyAfterOrder($item->product_id, $item->quantity);
                if ($res_u['data'][0]->message === 'Insufficient quantity') :
                    return $this->failed("Insufficient quantity!")->set("data", ["product_id"=> $item->product_id])->render_json();
                endif;
                if (false === ($res_u['status'] ?? FALSE)) :
                    return $this->failed("Update failed!")->set("data", [])->render_json();
                endif;
            }
        }

        $res = $this->order->changeStatus($in_id, $in_status);

        if (false === ($res['status'] ?? FALSE)) :
            return $this->failed("Update failed!")->set("data", [])->render_json();
        endif;

        return $this
            ->success("Order updated successfully!")
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }
}
