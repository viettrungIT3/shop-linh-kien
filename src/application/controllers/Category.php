<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Category_model", "category");
    }

    /**
     * action:      category/get/{id}/{user_id}
     * method:      get
     * description: get info category by id and user_id
     * return:      object
     */
    public function get(
        $in_id              = NULL,
        $in_create_by       = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing category id")->render_json();

        $res = $this->category->get($in_id, $in_create_by);

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Not found: category_id={$in_id} and create_by_id={$in_create_by}")->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }

    /**
     * action:      category/list/{user_id}
     * method:      get
     * description: get info category by user_id     
     * return:      object
     */
    public function list() {

        $res = $this->category->list();

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Not found category created by user_id{$in_create_by}!")->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }

}
