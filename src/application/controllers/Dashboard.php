<?php
class Dashboard extends MY_Controller
{
	public function __construct()
	{

		parent::__construct();
		// $this->verify_authentication();
		$this->load->model('User_model', 'user');
		$this->load->model('Product_model', 'product');
		$this->load->model("Cart_model", "cart");
		$this->load->model("Order_model", "order");
		$this->load->model("Category_model", "category");

		$user = $this->user->get_detail();
		$categories = $this->category->list();

		if ($user == null) {
			$num_carts = 0;
		} else {
			$num_carts = count($this->cart->CountListByUserId($user["id"])['data']);
		}
		return $this
			->set("user", $user)
			->set("categories", $categories)
			->set("num_carts", $num_carts);
	}

	public function index()
	{

		$products_top5new = $this->product->listTop5New();



		return $this
			->set("products_top5new", $products_top5new)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_main_template("index")
			->render();
	}

	public function single_product(
		$in_id = NULL
	) {

		$product = $this->product->get($in_id);

		return $this
			->set("product", $product)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_main_template("single-product")
			->render();
	}

	public function shop(
		$category_id = NULL
	) {
		if ($category_id == NULL) {
			$products = $this->product->listPublic();
		} else {
			$products = $this->product->listPublicByCategory($category_id);
			$category_name = $this->category->get($category_id)['data'][0]->name;
		}

		return $this
			->set("category_name", $category_name ?? '')
			->set("products", $products)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_main_template("shop")
			->render();
	}

	public function cart()
	{
		if ($this->get("user") == NULL) {
			echo '<script>alert("You must to login!"); window.location.href = "http://shop.localhost.com:9292/login"</script>';
			die();
		}
		$carts = $this->cart->listByUserId($this->get("user")["id"]);



		return $this
			->set("carts", $carts)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_page_title("Card")
			->set_main_template("cart")
			->render();
	}


	public function checkout(
		$url = NULL
	) {

		$arr_id = explode(',', urldecode($url));

		$orders = [];

		foreach ($arr_id as $id) {
			$carts = $this->cart->get($id)['data'][0];
			$orders[] = $carts;
		}

		return $this
			->set("orders", $orders)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Checkout Order")
			->set_main_template("checkout")
			->render();
	}



	public function order()
	{
		if ($this->get("user") == NULL) {
			echo '<script>alert("You must to login!"); window.location.href = "http://shop.localhost.com:9292/login"</script>';
			die();
		}
		$orders = $this->order->listDetailByUser($this->get("user")["id"]);

		return $this
			->set("orders", $orders)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_page_title("Order")
			->set_main_template("order")
			->render();
	}

	public function contact()
	{

		return $this
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_page_title("Contact")
			->set_main_template("contact")
			->render();
	}
}
