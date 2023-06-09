<?php
defined("BASEPATH") or die("no direct scripting");

class Category_model extends MY_Model
{
    // description: func to get info category
    public function get(
        $in_id              = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        $res = $this->db->query("call category_get(?)", array($in_id));
        return $this->process_results($res)->get_results();
    }

    // description: func to get list category:
    public function list()
    {
        $res = $this->db->query("call category_list()", array());
        return $this->process_results($res)->get_results();
    }

    // description: func to get list category by use
    public function listByUserID(
        $created_at = NULL
    )
    {
        $res = $this->db->query("call category_list_by_userID($created_at)", array());
        return $this->process_results($res)->get_results();
    }

    // description: func create category
    public function create(
        $in_user_id     = NULL,
        $in_name        = NULL,
        $in_description = NULL
    ) {

        $res = $this->db->query("call category_create(?,?,?)", array(
            $in_user_id,
            $in_name,
            $in_description 
        ));

        return $this->process_results($res)->get_results();
    }

    // description: func to update category
    public function update(
        $in_user_id     = NULL,
        $in_id          = NULL,
        $in_name        = NULL,
        $in_description = NULL,
        $in_status      = NULL
    ) {

        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();
        if (NULL === $in_id)        return $this->failed("Missing category id")->get_results();

        $res = $this->db->query("call category_update(?,?,?,?,?)",
            array(
                $in_user_id,
                $in_id,
                $in_name,
                $in_description,
                $in_status
            )
        );

        // var_dump($this->db->last_query()); die;

        return $this->process_results($res)->get_results();
    }

    // description: func to delete test 
    public function delete(
        $in_user_id = NULL,
        $in_id      = NULL
    ) {
        if (NULL === $in_id)        return $this->failed("Missing id")->get_results();
        if (NULL === $in_user_id)   return $this->failed("Missing user id")->get_results();

        $res = $this->db->query("call category_update_status(?,?,?)", array(
            $in_user_id,
            $in_id,
            2
        ));

        return $this->process_results($res)->get_results();
    }
}
