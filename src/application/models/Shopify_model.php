<?php
class Shopify_model extends MY_Model{
    
    private $shopify_scopes = "read_orders,read_customers";
    private $shopify = NULL;
    private $shopify_redirect_url = NULL;
    private $access_token = "";

    public function __construct(){
        parent::__construct();
        $this->shopify_redirect_url = $_ENV['AUTH_URL'];
    }

    // init this process on a public app -- in app store
    private function init_shopify(){
        if(NULL === $this->shopify):
            $this->shopify = new PHPShopify\ShopifySDK($this->config->item('shopify'));
        endif;
        return $this;
    }

    //
    public function get_instance(){
        $this->init_shopify();
        return $this->shopify;
    }

}
