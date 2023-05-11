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

		$user = $this->user->get_detail();
		if ($user == null) {
			$num_carts = 0;
		} else {
			$num_carts = count($this->cart->CountListByUserId($user["id"])['data']);
		}
		return $this
			->set("user", $user)
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

	public function shop()
	{

		$products = $this->product->listPublic();

		return $this
			->set("products", $products)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_main_template("shop")
			->render();
	}

	public function checkout(
		$encodeStr = NULL
	) {



		return $this
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_main_template("checkout")
			->render();
	}

	public function cart()
	{


		$user = $this->user->get_detail();
		$carts = $this->cart->listByUserId($user["id"]);
		$num_carts = count($this->cart->CountListByUserId($user["id"])['data']);



		return $this
			->set("user", $user)
			->set("num_carts", $num_carts)
			->set("carts", $carts)
			->set_full_layout(TRUE)
			->set_body_class("dashboard-listing")
			->set_page_title("Welcome")
			->set_page_title("Card")
			->set_main_template("cart")
			->render();
	}
}
