<?php
class Dashboard_Admin extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->verify_authentication();
		$this->load->model('User_model', 'user');
		$this->check_login_admin();
	}

	public function check_login_admin()
	{
		$users = $this->user->get_detail();
		// echo '<pre>';
		// var_dump($users);
		// echo '</pre>';
		// die();
		ob_start();

		if (!isset($users) || $users == null) {
			echo "<script>alert('You need to login with admin account before accessing this page!');</script>";
			redirect('login');
		} else if ($users['role_id'] == 3) {
			echo "<script>alert('Your account is not allowed to login to this site!');</script>";
			redirect('/');
		} 
		ob_end_clean();
	}

	public function index()
	{
		ob_start(); 
		$users = $this->user->get_user_current();

		// echo '<pre>'; 
		// var_dump($users['data']);
		// echo '</pre>';
		// ob_end_flush(); 
		// die();

		return $this
			->set("user_info", ($users))
			->set("data_source", base_url("/category/list"))
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Admin")
			->set_main_template("admin/index")
			->render();
	}

	public function categories()
	{

		$this->load->model('Category_model', 'category');

		$data_categories = $this->category->list();
		// echo '<pre>'; 
		// var_dump($data_categories);
		// echo '</pre>';
		// die();
		$user = $this->user->get_detail();
		// if ( $user ) {
		// 	# code...
		// }

		// var_dump($user); die();

		return $this
			->set("user", $user)
			->set("data_source", "http://gw-export.localhost.com:9393/order/search")
			->set("download_url", get_csv_url())
			->set("download_filename", "Category")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Category")
			->set_main_template("admin/categories")
			->render();
	}

	public function products()
	{

		$this->load->model('Category_model', 'category');

		$data_category = $this->category->list();
		echo '<pre>';
		var_dump($data_category);
		echo '</pre>';
		die();
		$user = $this->user->get_detail();
		// if ( $user ) {
		// 	# code...
		// }

		// var_dump($user); die();

		return $this
			->set("user", $user)
			->set("data_source", base_url("/order/search"))
			->set("download_url", get_csv_url())
			->set("download_filename", "Products")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Products")
			->set_main_template("admin/products")
			->render();
	}
}
