<?php
class Dashboard extends MY_Controller{
	public function __construct()
    {

        parent::__construct();
        $this->verify_authentication();
		
    }
    public function index(){
		
		return $this
        ->set("data_source", base_url("/order/search"))
		->set("download_url", get_csv_url())
		->set("download_filename", "Shop order transaction report")
		// ->set_full_layout(TRUE)
		->set_body_class("dashboard-listing")
		->set_page_title("dashboard_listing")
		->set_main_template("dashboard-listing")
		->render();
    }

}
