<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_model", "product");
    }

    /**
     * action:      product/{id}
     * method:      get
     * description: get info product by id
     * return:      object
     */
    public function get(
        $in_id              = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing product id")->render_json();

        $res = $this->product->get($in_id);

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Not found: product_id={$in_id}")->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->render_json();
    }

    /**
     * action:      product/list/
     * method:      get
     * description: get list categories
     * return:      object
     */
    public function list()
    {

        $res = $this->product->list();

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Not found product created by user_id{$in_create_by}!")->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->render_json();
    }

    /**
     * action:      product/create
     * method:      post
     * body:        json {}
     * description: create product and create question    
     * return:      object
     */
    public function create()
    {

        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();
        if (!isset($posting_data['category_id']) || NULL === $posting_data['category_id'])
            return $this->failed("Missing category id")->render_json();

        $in_user_id     = $posting_data['user_id'];
        $in_category_id = $posting_data['category_id'];
        $in_name                = NULL;
        $in_price               = 0.0;
        $in_description         = NULL;
        $in_brand               = NULL;
        $in_warranty            = NULL;
        $in_gift_info           = NULL;
        $in_quantity            = 0;
        $in_size                = NULL;
        $in_weight              = 0.0;
        $in_special_features    = NULL;

        isset($posting_data['name'])            && $in_name = $posting_data['name'];
        isset($posting_data['price'])           && $in_price = $posting_data['price'];
        isset($posting_data['description'])     && $in_description = $posting_data['description'];
        isset($posting_data['brand'])           && $in_brand = $posting_data['brand'];
        isset($posting_data['warranty'])        && $in_warranty = $posting_data['warranty'];
        isset($posting_data['gift_info'])       && $in_gift_info = $posting_data['gift_info'];
        isset($posting_data['quantity'])        && $in_quantity = $posting_data['quantity'];
        isset($posting_data['size'])            && $in_size = $posting_data['size'];
        isset($posting_data['weight'])          && $in_weight = $posting_data['weight'];
        isset($posting_data['special_features']) && $in_special_features = $posting_data['special_features'];

        $res = $this->product->create(
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
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Create product fail')->set("data", [])->render_json();
        endif;

        return $this
            ->success("Create product successful!")
            ->set("data", $res['data'])
            ->render_json();
    }

    /**
     * action:      product/update
     * method:      post
     * body:        json {}
     * description: update info user by product_id & user_id     
     * return:      object
     */
    public function update()
    {
        $posting_data = $this->get_posting_data();
        
        if (!isset($posting_data['id']) || NULL === $posting_data['id'])
            return $this->failed("Missing product id")->render_json();
        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();

        $in_id              = $posting_data['id'];
        $in_user_id         = $posting_data['user_id'];

        $res_product = $this->product->get($in_id);


        if (false === ($res_product['status'] ?? FALSE) || 0 == count($res_product['data'])) :
            return $this->failed('Get product not found')->render_json();
        endif;

        $the_product = $res_product['data'][0];

        $res = $this->product->update(
            $in_user_id,
            $in_id,
            isset($posting_data['category_id']) ? $posting_data['category_id'] : $the_product->category_id,
            isset($posting_data['name']) ? $posting_data['name'] : $the_product->name,
            isset($posting_data['price']) ? $posting_data['price'] : $the_product->price,
            isset($posting_data['description']) ? $posting_data['description'] : $the_product->description,
            isset($posting_data['brand']) ? $posting_data['brand'] : $the_product->brand,
            isset($posting_data['warranty']) ? $posting_data['warranty'] : $the_product->warranty,
            isset($posting_data['gift_info']) ? $posting_data['gift_info'] : $the_product->gift_info,
            isset($posting_data['quantity']) ? $posting_data['quantity'] : $the_product->quantity,
            isset($posting_data['size']) ? $posting_data['size'] : $the_product->size,
            isset($posting_data['weight']) ? $posting_data['weight'] : $the_product->weight,
            isset($posting_data['special_features']) ? $posting_data['special_features'] : $the_product->special_features,
            isset($posting_data['status']) ? $posting_data['status'] : $the_product->status
        );
        
        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Failed to update product ID= {$in_id}")->set("data", [])->render_json();
        endif;

        // Delete image
        $this->load->model("Product_Images_model", "product_images");
        $this->product_images->delete($in_id);

        return $this
            ->success("Product has ID = {$in_id} was updated")
            ->set("data", $res['data'])
            ->render_json();
    }

    /**
     * action:      product/delete/{user_id}/{id}
     * method:      delete
     * description: get info product by id and user_id
     * return:      object
     */
    public function delete(
        $in_user_id         = NULL,
        $in_id              = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing product id")->render_json();

        $res = $this->product->delete($in_user_id, $in_id);

        if (false === ($res['status'] ?? FALSE)) :
            return $this->failed("Update failed")->set("data", [])->render_json();
        endif;

        // echo '<pre>'; 
        // var_dump($res['data'][0]->message);
        // echo '</pre>';
        // die();

        return $this
            ->success("Delete successful!")
            ->render_json();
    }
}
