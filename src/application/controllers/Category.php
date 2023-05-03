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
     * action:      category/get/{id}
     * method:      get
     * description: get info category by id
     * return:      object
     */
    public function get(
        $in_id              = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing category id")->render_json();

        $res = $this->category->get($in_id);

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Not found: category_id={$in_id}")->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }

    /**
     * action:      category/list/
     * method:      get
     * description: get list categories
     * return:      object
     */
    public function list()
    {

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

        /**
     * action:      category/create
     * method:      post
     * body:        json {}
     * description: create category and create question    
     * return:      object
     */
    public function create()
    {

        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();

        $in_user_id     = $posting_data['user_id'];
        $in_name        = NULL;
        $in_description = NULL;

        isset($posting_data['name'])        && $in_name = $posting_data['name'];
        isset($posting_data['description']) && $in_description = $posting_data['description'];

        $res = $this->category->create(
            $in_user_id,
            $in_name,
            $in_description 
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Create category fail')->set("data", [])->render_json();
        endif;

        return $this
            ->success("Create category successfull!")
            ->set("data", $res['data'])
            ->render_json();
    }

    /**
     * action:      category/update
     * method:      post
     * body:        json {}
     * description: update info user by category_id & user_id     
     * return:      object
     */
    public function update()
    {
        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['id']) || NULL === $posting_data['id'])
            return $this->failed("Missing category id")->render_json();
        if (!isset($posting_data['user_id']) || NULL === $posting_data['user_id'])
            return $this->failed("Missing user id")->render_json();

        $in_id              = $posting_data['id'];
        $in_user_id         = $posting_data['user_id'];

        $res_category = $this->category->get($in_id);

        if (false === ($res_category['status'] ?? FALSE) || 0 == count($res_category['data'])) :
            return $this->failed('Get category not found')->render_json();
        endif;

        $the_category = $res_category['data'][0];

        $res = $this->category->update(
            $in_user_id,
            $in_id,
            isset($posting_data['name']) ? $posting_data['name'] : $the_category->name,
            isset($posting_data['description']) ? $posting_data['description'] : $the_category->description,
            isset($posting_data['status']) ? $posting_data['status'] : $the_category->status,
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed("Failed to update category ID= {$in_id}")->set("data", [])->render_json();
        endif;

        return $this
            ->success("Category has ID = {$in_id} was updated")
            ->set("data", $res['data'])
            ->render_json();
    }

        /**
     * action:      category/delete/{user_id}/{id}
     * method:      delete
     * description: get info category by id and user_id
     * return:      object
     */
    public function delete(
        $in_user_id         = NULL,
        $in_id              = NULL
    ) {
        if (NULL === $in_id) return $this->failed("Missing category id")->render_json();

        $res = $this->category->delete($in_user_id, $in_id);

        if (false === ($res['status'] ?? FALSE)) :
            return $this->failed("Update failed")->set("data", [])->render_json();
        endif;

        // echo '<pre>'; 
		// var_dump($res['data'][0]->message);
		// echo '</pre>';
		// die();

        return $this
            ->success("Delete successful!")
            ->set("data", $res['data'])
            ->render_json();
    }
}
