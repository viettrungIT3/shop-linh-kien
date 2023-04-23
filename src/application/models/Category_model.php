<?php
defined("BASEPATH") or die("no direct scripting");

class Category_model extends MY_Model
{
    // description: func to get info category
    public function get(
        $in_id              = NULL,
        $in_create_by       = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        if (NULL === $in_create_by) {
            $res = $this->db->query("call category_get(?)", array($in_id));
            return $this->process_results($res)->get_results();
        }

        $res = $this->db->query("call category_get_by_user(?,?)", array($in_id, $in_create_by));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list category:
    public function list() {
        $res = $this->db->query("call category_list()", array());
        return $this->process_results($res)->get_results();
    }

    // description: func create category
    public function create(
        $in_user_id         = NULL,
        $in_clone_id        = NULL,
        $in_title           = NULL,
        $in_type            = NULL,
        $in_image           = NULL,
        $in_description1    = NULL,
        $in_description2    = NUll
    ) {

        $res = $this->db->query("call category_create(?,?,?,?,?,?,?)", array(
            $in_user_id,
            $in_clone_id,
            $in_title,
            $in_type,
            $in_image,
            $in_description1,
            $in_description2
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func to update category
    public function update(
        $in_id,
        $in_user_id,
        $in_title           = NULL,
        $in_image           = NULL,
        $in_description1    = NULL,
        $in_description2    = NUll,
        $in_is_show_result  = NULL,
        $in_status          = NULL
    ) {

        if (NULL === $in_id)         return $this->failed("Missing category id")->get_results();
        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();

        $res = $this->db->query(
            "call category_update(?,?,?,?,?,?,?,?)",
            array(
                $in_id,
                $in_user_id,
                $in_title,
                $in_image,
                $in_description1,
                $in_description2,
                $in_is_show_result,
                $in_status
            )
        );

        // echo '<pre>';
        // var_dump($this->db->last_query());
        // die;

        return $this->process_results($res)->get_results();
    }

    // description: func to delete test 
    public function delete(
        $in_id         = NULL,
        $in_user_id         = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();

        $res = $this->db->query("call category_delete(?,?)", array(
            $in_user_id,
            $in_id
        ));

        return $this->process_results($res)->get_results();
    }
}
