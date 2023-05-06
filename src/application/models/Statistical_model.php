<?php
defined("BASEPATH") or die("no direct scripting");

class Statistical_model extends MY_Model
{
    // description: func to get total user
    public function total_user()
    {
        $res = $this->db->query("SELECT COUNT(*) as total_user FROM users WHERE role_id = 1");
        return $this->process_results($res)->get_results();
    }

    // description: func to get total admin & staff
    public function total_admin_staff()
    {
        $res = $this->db->query("SELECT COUNT(*) as total_admin_staff FROM users WHERE role_id IN (1, 2)");
        return $this->process_results($res)->get_results();
    }

    // description: func to get total category
    public function total_category()
    {
        $res = $this->db->query("SELECT COUNT(*) as total_category FROM Categories");
        return $this->process_results($res)->get_results();
    }

    // description: func to get total product
    public function total_product()
    {
        $res = $this->db->query("SELECT COUNT(*) as total_product FROM Products");
        return $this->process_results($res)->get_results();
    }

    // description: func to get total user, total admin & staff, total category, total product
    public function total()
    {
        $total_user = $this->total_user()["data"][0]->total_user;
        $total_admin_staff = $this->total_admin_staff()["data"][0]->total_admin_staff;
        $total_category = $this->total_category()["data"][0]->total_category;
        $total_product = $this->total_product()["data"][0]->total_product;
        return array('total_user' => $total_user, 'total_admin_staff' => $total_admin_staff, 'total_category' => $total_category, 'total_product' => $total_product);
    }

    public function top_5_bestsellers()
    {
        $res = $this->db->query(
            "SELECT p.id, p.name, p.price, p.sold_quantity, p.quantity 
            FROM Products p 
            ORDER BY p.sold_quantity DESC 
            LIMIT 5"
        );
        return $this->process_results($res)->get_results();
    }
}
