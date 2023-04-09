<?php
class Shopify_order extends MY_Controller{

    /*
     * @description: to get all today orders
     * @return object
     * */
    public function search_today(){
        $the_date = date("Y-m-d", strtotime("-1 days")) . "T00:00:00-07:00"; // yesterday timezone LA
        $this->load->model("Shopify_order_model", "order");
        $this->load->model("Shopify_transaction_model", "transaction");

        $res = $this->order->search(NULL, $the_date, "open", 250);

        if(FALSE === ($res['status'] ?? FALSE)):
            return $this->failed($res['error'])->render_json();
        endif;

        // save orders to database
        $this->order->order_insert($res);

        //save transaction to database
        foreach ($res['data'] as $ele) {
            //get transaction for order id
            $result_tran = $this->transaction->get_transactions($ele['id']);

            $this->transaction->transaction_insert($result_tran);
        }

        return $this->success()->set("data", $res['data'])->render_json();
    }

	/*
     * @description: to get all transactions by order id
	 * exam: /order/5198905245855/transactions
     * @return object
     * */
	public function get_transactions (
		string $in_order_id = NULL
	){
		$this->load->model("Shopify_transaction_model", "transaction");
        $res = $this->transaction->get_transactions($in_order_id);

		if(FALSE === ($res['status'] ?? FALSE)):
            return $this->failed($res['error'])->render_json();
        endif;

        return $this->success()->set("data", $res['data'])->render_json();
	}

	public function orders_search(){
		$this->load->model("Shopify_order_model", "order");

		$input_sort                 = NULL;
        $int_sort                   = 1;
        $input_sort_dir             = DF_SORT_DIR;
        $input_current_page         = 1;
        $input_num_rows             = DF_NUM_ROWS;
		$input_start_date = NULL;
		$input_end_date    = NULL;
		

                $posting_data = $this->get_posting_data();  

                $input_start_date                  = $posting_data["input_start_date"] ?? NULL;
				$input_start_date === "" ? $input_start_date = NULL : $input_start_date;
                $input_end_date                  = $posting_data['input_end_date'] ?? NULL;
				$input_end_date === "" ? $input_end_date = NULL : $input_end_date;
                $input_page                     = $posting_data['input_page'] ?? 1;
                $input_sort                     = $posting_data['input_sort'] ?? 1;
                $input_sort_dir                 = $posting_data['input_sort_dir'] ?? DF_SORT_DIR;

				switch($input_sort):
					case "customer_first_name": $int_sort = 1; break;
					case "customer_last_name": $int_sort = 2; break;
					case "product_name": $int_sort = 3; break;
					case "order_total": $int_sort = 4; break;
                    case "created_at": $int_sort = 5; break;
					case "transId": $int_sort = 6; break;
					case "invoice_number": $int_sort = 7; break;
					case "transaction_date": $int_sort = 8; break;
					case "amount": $int_sort = 9; break;
				endswitch;
		
				$input_sort_dir === DF_SORT_DIR && $int_sort = -1 * $int_sort;


                if(isset($posting_data['is_downloading']) && 1 === (int)$posting_data['is_downloading']):
                        $input_num_rows = MAX_NUM_ROWS;
                        $input_page = 1;
                endif;


		if($input_end_date === NULL && $input_start_date === NULL):
			$res = $this->order->orders_list( $int_sort,$input_page ,$input_num_rows);
		else: 
			$res = $this->order->orders_search(  $input_start_date , $input_end_date ,$int_sort   ,$input_page ,$input_num_rows);


		endif;


		if ($res['status'] ?? FALSE && count($res['total']) > 0) :

            return $this->success($res['messages'] ?? "")
                ->set("data", $res['data'])
                ->set("total", $res['total'])
                ->set("page",  $input_page)
                ->set("limit", $input_num_rows)
                ->render_json();

        endif;
	}
}
