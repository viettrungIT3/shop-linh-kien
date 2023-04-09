<?php
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class Authnet_model extends MY_Model{

    private $the_auth = NULL;
    public function authenticate(){
        $the_auth = new AnetAPI\the_authType();
        $the_auth->setName($_ENV['AUTHNET_LOGIN_ID']);
        $the_auth->setTransactionKey($_ENV['AUTHNET_TRANSACTION_KEY']);
        return $this;
    }


    /*
     * @description: to list all settled batch list from a date range
     * @param: DateTime $date_from
     * @param: DateTime $date_to
     * @return object
        * */
    function get_settled_batch_list(DateTime $date_from = NULL, DateTime $date_to = NULL) {
        /* Create a the_authType object with authentication details
             retrieved from the constants file */
        $the_auth = new AnetAPI\MerchantAuthenticationType();
        
        $the_auth->setName($_ENV['AUTHNET_LOGIN_ID']);
        $the_auth->setTransactionKey($_ENV['AUTHNET_TRANSACTION_KEY']);
        
        // Set the transaction's refId
        $refId = 'ref' . time();

        $request = new AnetAPI\GetSettledBatchListRequest();
        $request->setMerchantAuthentication($the_auth);
        $request->setIncludeStatistics(true);
        
        // Both the first and last dates must be in the same time zone
        // The time between first and last dates, inclusively, cannot exceed 31 days.
        $request->setFirstSettlementDate($date_from);
        $request->setLastSettlementDate($date_to);

        $controller = new AnetController\GetSettledBatchListController ($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        $the_list = [];

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            foreach($response->getBatchList() as $batch) {
                $single = [
                    "ID" => $batch->getBatchId(),
                    "settled_at_utc" => $batch->getSettlementTimeUTC()->format('r'),
                    "settled_at_local" => $batch->getSettlementTimeLocal()->format('r'),
                    "state" => $batch->getSettlementState(),
                    "market_type" => $batch->getMarketType(),
                    "product" => $batch->getProduct(),
                    "stats" => []
                ];
                foreach($batch->getStatistics() as $statistics) {
                    $single['stats'] = [
                        "account_type" => $statistics->getAccountType(),
                        "total" => $statistics->getChargeAmount(),
                        "charge_count" => $statistics->getChargeCount(),
                        "refund" => $statistics->getRefundAmount(),
                        "refund_count"  => $statistics->getRefundCount(),
                        "void_count" => $statistics->getVoidCount(),
                        "decline_count" => $statistics->getDeclineCount(),
                        "error_amount" => $statistics->getErrorCount()
                    ];
                }

                $the_list[] = $single;

            }
        
            return $this->success()->set("data", $the_list)->get_results();
        }

        $the_error = $response->getMessages()->getMessage();
        return $this
                    ->failed($the_error[0]->getCode() . " | {$the_error[0]->getText()}")
                    ->get_results();
    }



	/*
     * @description: to list all transaction list
     * @param: string in_batch_id
     * @return object
        * */
	public function get_transaction_list(string $in_batch_id = NULL) {
		if(NULL === $in_batch_id) return $this->failed("Missing batch id")->get_results();

		/* Create a the_authType object with authentication details
			retrieved from the constants file */
		$the_auth = new AnetAPI\MerchantAuthenticationType();

		$the_auth->setName($_ENV['AUTHNET_LOGIN_ID']);
		$the_auth->setTransactionKey($_ENV['AUTHNET_TRANSACTION_KEY']);

		// Set the transaction's refId
        $refId = 'ref' . time();

		//Setting a valid batch Id for the Merchant
		$batchId = $in_batch_id;
		$request = new AnetAPI\GetTransactionListRequest();
		$request->setMerchantAuthentication($the_auth);
		$request->setBatchId($batchId);

		$controller = new AnetController\GetTransactionListController($request);

		//Retrieving transaction list for the given Batch Id
    	$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);



		if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
    	{
			return $this->success()->set("data", $response->getTransactions())->get_results();
		}

		$the_error = $response->getMessages()->getMessage();
        return $this
                    ->failed($the_error[0]->getCode() . " | {$the_error[0]->getText()}")
                    ->get_results();
	}

    public function authorize_back_insert($data){

        if(true !== $data['status']):
            $result["status"] =  FALSE;
            $result["message"] = "can't insert authorize back";

            return $result;
        endif;
        
        $this->init_m_sql();

        foreach($data['data'] as $ele){

            $params = array();
            
            NULL === $ele['ID'] && $params[] = "NULL";
            NULL !== $ele['ID'] && $params[] = $ele['ID'];

            NULL === $ele['stats']['charge_count'] && $params[] = "NULL";
            NULL !== $ele['stats']['charge_count'] && $params[] = $ele['stats']['charge_count'];

            NULL === $ele['stats']['refund_count'] && $params[] = "NULL";
            NULL !== $ele['stats']['refund_count'] && $params[] = $ele['stats']['refund_count'];

            NULL === $ele['stats']['decline_count'] && $params[] = "NULL";
            NULL !== $ele['stats']['decline_count'] && $params[] = $ele['stats']['decline_count'];

            NULL === $ele['stats']['void_count'] && $params[] = "NULL";
            NULL !== $ele['stats']['void_count'] && $params[] = $ele['stats']['void_count'];

            NULL === $ele['stats']['total'] && $params[] = "NULL";
            NULL !== $ele['stats']['total'] && $params[] = $ele['stats']['total'];

            NULL === $ele['stats']['refund'] && $params[] = "NULL";
            NULL !== $ele['stats']['refund'] && $params[] = $ele['stats']['refund'];

            NULL === $ele['settled_at_utc'] && $params[] = "NULL";
            NULL !== $ele['settled_at_utc'] && $params[] = "'" . date(DB_DATE_FORMAT_LONG, strtotime($ele['settled_at_utc'])) . "'";

            $sql = "CALL authorize_back_insert(" . implode(",", $params) . ")";

            $results = $this->db->query($sql);
        }

        return $this->process_results($results)->get_results();
    }

    public function authorize_transaction_insert($data , $authorize_id){

        if(true !== $data['status']):
            $result["status"] =  FALSE;
            $result["message"] = "can't insert authorize back";

            return $result;
        endif;
        
        $this->init_m_sql();

        foreach($data['data'] as $ele){

            $arr = json_decode(json_encode($ele), true);

            $params = array();
            
            NULL === $arr['transId'] && $params[] = "NULL";
            NULL !== $arr['transId'] && $params[] = $arr['transId'];

            $params[] = $authorize_id;

            NULL === $arr['invoiceNumber'] && $params[] = "NULL";
            NULL !== $arr['invoiceNumber'] && $params[] = '"'. $arr['invoiceNumber'] .'"';

            NULL === $arr['transactionStatus'] && $params[] = "NULL";
            NULL !== $arr['transactionStatus'] && $params[] = '"'. $arr['transactionStatus'] .'"';

            NULL === $arr['firstName'] && $params[] = "NULL";
            NULL !== $arr['firstName'] && $params[] = '"'. $arr['firstName'] .'"';

            NULL === $arr['lastName'] && $params[] = "NULL";
            NULL !== $arr['lastName'] && $params[] = '"'. $arr['lastName'] .'"';

            NULL === $arr['settleAmount'] && $params[] = "NULL";
            NULL !== $arr['settleAmount'] && $params[] = $arr['settleAmount'];

            NULL === $arr['submitTimeLocal'] && $params[] = "NULL";
            NULL !== $arr['submitTimeLocal'] && $params[] = "'" . date(DB_DATE_FORMAT_LONG, strtotime($arr['submitTimeLocal'])) . "'";

            $sql = "CALL authorize_transaction_insert(" . implode(",", $params) . ")";

            $results = $this->db->query($sql);
        }

        return $this->process_results($results)->get_results();
    }

}
