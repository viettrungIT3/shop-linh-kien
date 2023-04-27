<?php
class Dashboard extends MY_Controller{
	public function __construct()
    {

        parent::__construct();
        // $this->verify_authentication();
		$this->load->model('User_model', 'user');
    }
    public function index(){
		
		$user = $this->user->get_detail();
		
		return $this
        ->set("user", $user)
        ->set("data_source", "")
		->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Welcome")
		->set_main_template("index")
		->render();
    }

    public function single_product(){
		
		$user = $this->user->get_detail();
		
		return $this
        ->set("user", $user)
        ->set("data_source", "")
		->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Welcome")
		->set_main_template("single-product")
		->render();
    }

    public function shop(){
		
		$user = $this->user->get_detail();
		
		return $this
        ->set("user", $user)
        ->set("data_source", "")
		->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Welcome")
		->set_main_template("shop")
		->render();
    }

    public function checkout(){
		
		$user = $this->user->get_detail();
		
		return $this
        ->set("user", $user)
        ->set("data_source", "")
		->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Welcome")
		->set_main_template("checkout")
		->render();
    }

    public function cart(){
		
		$user = $this->user->get_detail();
		
		return $this
        ->set("user", $user)
        ->set("data_source", "")
		->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Welcome")
		->set_page_title("Card")
		->set_main_template("cart")
		->render();
    }
}
