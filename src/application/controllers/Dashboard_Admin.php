<?php
class Dashboard_Admin extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->verify_authentication();
		$this->load->model('User_model', 'user');
		$this->load->model('Category_model', 'category');
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
		$users = $this->user->get_user_current();

		// echo '<pre>'; 
		// var_dump($users);
		// echo '</pre>';
		// die();

		return $this
			->set("user_info", ($users))
			->set_body_class("dashboard-listing")
			->set_page_title("Admin")
			->set_main_template("admin/index")
			->render();
	}

	public function categories()
	{
		$users = $this->user->get_user_current();
		$categories = $this->category->list();

		// echo '<pre>'; 
		// var_dump($users);
		// echo '</pre>';
		// die();

		return $this
			->set("user_info", ($users))
			->set("categories", ($categories))
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

		$users = $this->user->get_user_current();

		// echo '<pre>'; 
		// var_dump($users);
		// echo '</pre>';
		// die();

		return $this
			->set("user_info", ($users))
			->set("download_filename", "Products")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Products")
			->set_main_template("admin/products")
			->render();
	}
}
