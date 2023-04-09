<?php
class Shopify_order_model extends MY_Model{

    /*
     * @description: to get the full list of order 
     * with params can be found at 
     * @ref: https://shopify.dev/api/admin-rest/2022-10/resources/order#get-orders?status=any
     * @param: date $in_created_at_max: iso 8601 Y-m-d h:i:s, 
     * @param: date $in_created_at_min
     * @param: int $in_limit
     * 
     * */
    public function search(
        string $in_created_at_max = NULL,
        string $in_created_at_min = NULL, 
        string $in_status = NULL, 
        int $in_limit = DF_NUM_ROWS
    ){

        $this->load->model("Shopify_model", "shopify");
        $the_instance = $this->shopify->get_instance();
        $orders =  $the_instance->Order->get(
            [
                "created_at_max" => $in_created_at_max, 
                "created_at_min" => $in_created_at_min,
                "status"    => $in_status, 
                "limit" => $in_limit
            ]

        );

        if(!empty($orders)):
            return $this->success()->set("data", $orders)->get_results();
        endif;

        return $this->failed("Not found orders")->get_results();

    }


    /*
     * @description: tag an order 
     * @param: int $in_int_id : order id
     * @param: string $the_tag: a comma separated tags
     * @return object
     * */
    public function tag($in_int_id = NULL, $the_tag = NULL){

        if(NULL === $in_int_id) return $this->failed("Missing id")->get_results();
        if(NULL === $the_tag) return $this->failed("Missing tag")->get_results();

        $the_instance = $this->shopify->get_instance();

        try{
            $res = $the_instance->Order($in_int_id)->put([
                "id" => $in_int_id, 
                "tags" => $the_tag
            ]);

        }catch(\PHPShopify\Exception\ApiException $e){
            return $this->failed($e->getMessage())->get_results();
        }

        return $this->success("Updated tags {$the_tag}")->get_results();
    }




    /*
     * @description: to remove an order by id
     * @param: int $in_id_order  
     * @return object
     * */
    public function remove(int $in_id_order = NULL){

        if(NULL === $in_id_order) return $this->failed("Missing id order")->get_results();

        $this->load->model("Shopify_model", "shopify");
        $the_instance = $this->shopify->get_instance();

        try{
            $res = $the_instance->Order($in_id_order)->delete();

        }catch(\PHPShopify\Exception\ApiException $e){
            return $this->failed($e->getMessage())->get_results();
        }

        return $this->success()->set("data", $res)->get_results();

    }


    /*
     * @description: to return the details of an order by id
     * @param: int $in_id_order  
     * @return object
     * */
    public function get_details(int $in_id_order = NULL){

        if(NULL === $in_id_order) return $this->failed("Missing id order")->get_results();

        $this->load->model("Shopify_model", "shopify");
        $the_instance = $this->shopify->get_instance();

        try{
            $res = $the_instance->Order($in_id_order)->get();

        }catch(\PHPShopify\Exception\ApiException $e){
            return $this->failed($e->getMessage())->get_results();
        }

        return $this->success()->set("data", $res)->get_results();

    }



    public function upcoming(){
        $this->load->model("Recharge_model", "re_model");
        $res = $this->re_model->send_data("/orders", "GET", ["status" => "pending"]);
       var_dump($res);
    }

    public function order_insert($data){

        if(true !== $data['status']):
            $result["status"] =  FALSE;
            $result["message"] = "can't insert order";

            return $result;
        endif;
        
        $this->init_m_sql();

        foreach($data['data'] as $ele){

            $params = array();
            
            NULL === $ele['id'] && $params[] = "NULL";
            NULL !== $ele['id'] && $params[] = $ele['id'];

            NULL === $ele['line_items'][0]['fulfillable_quantity'] && $params[] = "NULL";
            NULL !== $ele['line_items'][0]['fulfillable_quantity'] && $params[] = $ele['line_items'][0]['fulfillable_quantity'];

            NULL === $ele['line_items'][0]['name'] && $params[] = "NULL";
            NULL !== $ele['line_items'][0]['name'] && $params[] ='"'. $ele['line_items'][0]['name'] .'"';

            NULL === $ele['current_subtotal_price'] && $params[] = "NULL";
            NULL !== $ele['current_subtotal_price'] && $params[] = $ele['current_subtotal_price'];

            NULL === $ele['customer']['id'] && $params[] = "NULL";
            NULL !== $ele['customer']['id'] && $params[] = $ele['customer']['id'];

            NULL === $ele['customer']['first_name'] && $params[] = "NULL";
            NULL !== $ele['customer']['first_name'] && $params[] = "'". $ele['customer']['first_name'] ."'";

            NULL === $ele['customer']['last_name'] && $params[] = "NULL";
            NULL !== $ele['customer']['last_name'] && $params[] = "'". $ele['customer']['last_name'] ."'";

            NULL === $ele['created_at'] && $params[] = "NULL";
            NULL !== $ele['created_at'] && $params[] = "'" . date(DB_DATE_FORMAT_LONG, strtotime($ele['created_at'])) . "'";

            $sql = "call shopify_order_insert(" . implode(",", $params) . ")";

            $results = $this->db->query($sql);
        }

        return $this->process_results($results)->get_results();
    }

	
	public function orders_search  ( 
		$current_start_date               = NULL,
		$current_end_date             = NULL,
		$int_sort                       = 1,
		$current_page                   = 1,
		$total_record                   = DF_NUM_ROWS
	){
		$this->init_m_sql();

        $sql = "call shopify_authorize_list_date(".
            (NULL === $current_start_date          ? "NULL" : "'{$current_start_date}'") . ", " .
            (NULL === $current_end_date          ? "NULL" : "'{$current_end_date}'") . ", " .
            (NULL === $int_sort                    ? "NULL" : $int_sort) . ", " .
            (NULL === $current_page                ? "NULL" : $current_page) . ", " .
            (NULL === $total_record                ? "NULL" : $total_record) .
        ")";

		
        $res = $this->m_query($sql);
	
        return $this->process_m_results($res)->get_results();
    }


	public function orders_list  ( 
		$int_sort                       = 1,
		$current_page                   = 1,
		$total_record                   = DF_NUM_ROWS
	){
		$this->init_m_sql();

        $sql = "call shopify_authorize_list(".
            (NULL === $int_sort                    ? "NULL" : $int_sort) . ", " .
            (NULL === $current_page                ? "NULL" : $current_page) . ", " .
            (NULL === $total_record                ? "NULL" : $total_record) .
        ")";

		
        $res = $this->m_query($sql);
	
        return $this->process_m_results($res)->get_results();
    }
}
