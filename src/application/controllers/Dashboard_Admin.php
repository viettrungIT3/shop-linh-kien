<?php
class Dashboard_Admin extends MY_Controller{
	public function __construct()
    {

        parent::__construct();
        // $this->verify_authentication();
		$this->load->model('User_model', 'user');
    }

    public function index(){
		$user = $this->user->get_detail();
		// if ( $user ) {
		// 	# code...
		// }

		// var_dump($user); die();
		
		return $this
        ->set("user", $user)
		->set("data_source", base_url("/order/search"))
		->set("download_url", get_csv_url())
		->set("download_filename", "Shop order transaction report")
		// ->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("Admin")
		->set_main_template("admin/index")
		->render();
    }

}
