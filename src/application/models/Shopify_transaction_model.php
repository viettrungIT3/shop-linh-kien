<?php
class Shopify_transaction_model extends MY_Model{

    /*
     * @description: retrieves a list of transactions
     * @ref: https://your-development-store.myshopify.com/admin/api/2022-07/orders/450789469/transactions.json
     * @param: int $in_order_id
     * 
     * */
    public function get_transactions(
        string $in_order_id = NULL
    ){

		if(NULL === $in_order_id) return $this->failed("Missing order id")->get_results();

        $this->load->model("Shopify_model", "shopify");
        $the_instance = $this->shopify->get_instance();
        $transactions =  $the_instance->Order($in_order_id)->Transaction->get();

        if(!empty($transactions)):
            return $this->success()->set("data", $transactions)->get_results();
        endif;

        return $this->failed("Not found transactions")->get_results();

    }

    public function transaction_insert($data){

        if(true !== $data['status']):
            $result["status"] =  FALSE;
            $result["message"] = "can't insert order";

            return $result;
        endif;
        
        $this->init_m_sql();

        $data_insert = $data['data'][0];

        $params = array();
        
        NULL === $data_insert['id'] && $params[] = "NULL";
        NULL !== $data_insert['id'] && $params[] = $data_insert['id'];

        NULL === $data_insert['order_id']&& $params[] = "NULL";
        NULL !== $data_insert['order_id']&& $params[] = $data_insert['order_id'];

        NULL === $data_insert['authorization']&& $params[] = "NULL";
        NULL !== $data_insert['authorization']&& $params[] ='"'. $data_insert['authorization'].'"';

        NULL === $data_insert['amount']&& $params[] = "NULL";
        NULL !== $data_insert['amount']&& $params[] = $data_insert['amount'];

        NULL === $data_insert['processed_at'] && $params[] = "NULL";
        NULL !== $data_insert['processed_at'] && $params[] = "'" . date(DB_DATE_FORMAT_LONG, strtotime($data_insert['processed_at'])) . "'";

        $sql = "CALL shopify_transaction_insert(" . implode(",", $params) . ")";
// var_dump($sql);die();
        $results = $this->db->query($sql);

        return $this->process_results($results)->get_results();
    }
}
