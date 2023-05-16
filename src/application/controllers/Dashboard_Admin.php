<?php
class Dashboard_Admin extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->verify_authentication();
		$this->load->model('Statistical_model', 'statistical');
		$this->load->model('User_model', 'user');
		$this->load->model('Category_model', 'category');
		$this->load->model('Product_model', 'product');
		$this->load->model('Order_model', 'order');
		$this->check_login_admin();
	}

	public function check_login_admin()
	{
		$users = $this->user->get_detail();

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
		$total = $this->statistical->total();
		$top_5_bestsellers = $this->statistical->top_5_bestsellers();

		$users = $this->user->get_user_current();

		return $this
			->set("total", ($total))
			->set("top_5_bestsellers", ($top_5_bestsellers))
			->set("user_info", ($users))
			->set_body_class("dashboard-listing")
			->set_page_title("Admin")
			->set_main_template("admin/index")
			->render();
	}

	public function categories()
	{
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$categories = $this->category->list();

		return $this
			->set("total", ($total))
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

	public function my_categories()
	{
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$categories = $this->category->listByUserID($users['data'][0]->id);

		return $this
			->set("total", ($total))
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
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$categories = $this->category->list();
		$products = $this->product->list();

		return $this
			->set("total", ($total))
			->set("user_info", ($users))
			->set("products", ($products))
			->set("categories", ($categories))
			->set("download_url", get_csv_url())
			->set("download_filename", "Products")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Products")
			->set_main_template("admin/products")
			->render();
	}

	public function my_products()
	{
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$categories = $this->category->list();
		$products = $this->product->listByUserID($users['data'][0]->id);

		return $this
			->set("total", ($total))
			->set("user_info", ($users))
			->set("products", ($products))
			->set("categories", ($categories))
			->set("download_url", get_csv_url())
			->set("download_filename", "Products")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Products")
			->set_main_template("admin/products")
			->render();
	}

	public function products_by_status(
		$in_status = NULL
	) {
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$categories = $this->category->list();
		$products = $this->product->listByStatus($in_status);

		return $this
			->set("total", ($total))
			->set("user_info", ($users))
			->set("products", ($products))
			->set("categories", ($categories))
			->set("download_url", get_csv_url())
			->set("download_filename", "Products")
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Products")
			->set_main_template("admin/products")
			->render();
	}


	public function orders(
		$in_status = NULL
	)
	{
		$total = $this->statistical->total();
		$users = $this->user->get_user_current();
		$orders = $this->order->list($in_status);

		// echo '<pre>'; 
		// var_dump($orders);
		// echo '</pre>';
		// die();

		return $this
			->set("total", ($total))
			->set("user_info", ($users))
			->set("orders", ($orders))
			->set("order_status", ($in_status))
			// ->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Orders")
			->set_main_template("admin/orders")
			->render();
	}
}
