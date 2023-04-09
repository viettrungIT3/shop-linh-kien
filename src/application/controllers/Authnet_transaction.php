<?php
class Authnet_transaction extends MY_Controller{

    public function list(){

        $this->load->model("Authnet_model", "anet_model");

        $get_date_yesterday = date("Y-m-d", strtotime("-1 days"));
        $date_from = new \DateTime($get_date_yesterday);
        $date_from->setTimezone(new DateTimeZone('UTC'));
        
        $date_to=new DateTime();
        $date_to->setTimezone(new DateTimeZone('UTC'));

        $res = $this->anet_model->get_settled_batch_list($date_from, $date_to);

        if(FALSE === $res['status']) 
            return $this->failed($res['errors'] ?? "No Records were found")
                        ->render_json();

        // save authorize to database
        $this->anet_model->authorize_back_insert($res);

        // save authorize transaction to database
        foreach ($res['data'] as $ele) {
            //get transaction for order id
            $result_tran = $this->anet_model->get_transaction_list($ele['ID']);

            $this->anet_model->authorize_transaction_insert($result_tran, $ele['ID']);
        }

        return $this
                ->success()
                ->set("data", $res['data'])
                ->render_json();
    }

	public function get_transactions(
		string $in_batch_id = NULL
	){
		$this->load->model("Authnet_model", "anet_model");

		$res = $this->anet_model->get_transaction_list($in_batch_id);

		if(FALSE === $res['status']) 
            return $this->failed($res['errors'] ?? "No Records were found")
                        ->render_json();

        return $this
                ->success()
                ->set("data", $res['data'])
                ->render_json();
	}
}
