<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_Images extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_Images_model", "product_images");
    }

    /**
     * action:      /api/v1/Product_Images/upload
     * method:      post
     * body:        json {}
     * description: create Product_Images    
     * return:      object
     */
    public function create()
    {
        $posting_data = $this->get_posting_data();
        if (!isset($posting_data['product_id'])) return $this->failed("Missing product id")->render_json();

        // Delete image old
        $this->load->model("Product_Images_model", "product_images");
        $this->product_images->delete($posting_data['product_id']);


        $product_id = $posting_data['product_id'];
        $images = $_FILES['image'];

        // Thư mục lưu ảnh
        $upload_path = './uploads/';

        // Lưu ảnh vào thư mục uploads
        $uploaded_images = array();
        foreach ($images['name'] as $key => $name) {
            $file_extension = pathinfo($name, PATHINFO_EXTENSION);
            $file_name = md5($name) . '_' . time() . '.' . $file_extension;
            $tmp_name = $images['tmp_name'][$key];
            move_uploaded_file($tmp_name, $upload_path . $file_name);
            $uploaded_images[] = $file_name;
        }

        // Lưu đường dẫn ảnh vào bảng Product_Images
        foreach ($uploaded_images as $image) {
            $res = $this->product_images->create(
                $product_id,
                $image
            );

            if (false === ($res['status'] ?? FALSE)) :
                return $this->failed('Upload fail')->render_json();
            endif;
        }

        return $this
            ->success()
            ->set("data", $res['data'])
            ->render_json();
    }
}
