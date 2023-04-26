<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user");
    }


    /**
     * action:      /api/v1/user/create
     * method:      post
     * body:        json {}
     * description: create user    
     * return:      object
     */
    public function create()
    {

        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['device_id'])) return $this->failed("Missing device id")->render_json();

        $in_name = NULL;
        $in_avatar = "";
        $in_device_id = $posting_data['device_id'];

        isset($posting_data['name'])         && $in_name = $posting_data['name'];
        isset($posting_data['avatar'])         && $in_avatar = $posting_data['avatar'];

        $res = $this->user->create(
            $in_device_id,
            $in_name,
            $in_avatar
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Create user fail')->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res['data'])
            ->set("errors", [])
            ->render_json();
    }

    /**
     * action:      user/get/{device_id}
     * method:      get
     * description: get info user by device_id     
     * return:      object
     */
    public function get(
        $in_device_id   = NULL
    ) {
        if (NULL === $in_device_id) return $this->failed("Missing device id")->render_json();

        $res_user = $this->user->get($in_device_id);

        if (false === ($res_user['status'] ?? FALSE) || 0 == count($res_user['data'])) :
            return $this->failed('Get user not found')->set("data", [])->render_json();
        endif;

        return $this
            ->success()
            ->set("data", $res_user['data'])
            ->set("errors", [])
            ->render_json();
    }




    /**
     * action:      user/update
     * method:      post
     * body:        json {}
     * description: update info user by user_id & device_id     
     * return:      object
     */
    public function update()
    {
        $posting_data = $this->get_posting_data();

        if (!isset($posting_data['id']) || NULL === $posting_data['id'])
            return $this->failed("Missing user id")->render_json();
        if (!isset($posting_data['device_id']) || NULL === $posting_data['device_id'])
            return $this->failed("Missing device id")->render_json();

        $res_user = $this->user->get($posting_data['device_id']);

        if (false === ($res_user['status'] ?? FALSE) || 0 == count($res_user['data'])) :
            return $this->failed('Get user not found')->render_json();
        endif;

        $the_user = $res_user['data'][0];

        // delete imge from the server
        if (isset($posting_data['avatar']) ) {
            $this->delete_img($the_user->avatar);
        } 

        $res = $this->user->update(
            $posting_data['id'],
            $posting_data['device_id'],
            isset($posting_data['name']) ? $posting_data['name'] : $the_user->name,
            isset($posting_data['avatar']) ? $posting_data['avatar'] : $the_user->avatar
        );

        if (false === ($res['status'] ?? FALSE) || 0 == count($res['data'])) :
            return $this->failed('Update user fail')->set("data", [])->render_json();
        endif;

        return $this
            ->success($res['message'])
            ->set("errors", [])
            ->render_json();
    }
}
