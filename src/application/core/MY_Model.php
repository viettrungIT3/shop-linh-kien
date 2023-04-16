<?php
defined("BASEPATH") OR exit("No direct access");
/*
Model will assist validating user if logged in
*/
class MY_Model extends CI_Model{

    // for multi resultset
    private $Data, $mysqli, $ResultSet;


    public $results = array("data" => array(), "status" => FALSE);

    public function success($message = ""){$this->results['status'] = TRUE; !empty($message) && $this->results["message"] = $message; return $this;}
    public function failed($message = ""){$this->results['status'] = FALSE; !empty($message) && $this->results["error"] = $message; return $this;}
    public function set($key, $value){ $this->results[$key] = $value; return $this; } ///
    public function get($key){ if(isset($this->results[$key])) return $this->results[$key]; return false; } // end of function get
    public function set_params($_data){ if(is_array($_data) && !empty($_data)) $this->results = array_merge($this->data, $_data); return $this; } // end of function set data

    public function __construct(){ parent::__construct(); }
    public function get_results(){return $this->results;}
    public function reset_data(){$this->results = array(); return $this;}

    public function process_results(&$res){
        $this->reset_data();

        if(0 === (int)$this->db->error()['code']):
            $this->success()->set("data", $this->fetch_results($res));
        else:
            $this->failed($this->db->error()['message']);
            $this->set("last_query", $this->db->last_query());
        endif;

        return $this;
    }

    public function process_m_results(&$res){

        $this->reset_data();
        if(0 === (int)$this->db->error()['code']):
            $_result = $this->fetch_m_results($res);
            $this->set("data", $_result['data']);
            $this->set("total", $_result['total']);
            $this->success("Success");
        else:
            $this->failed($this->db->error()['message']);
            $this->set("last_query", $this->db->last_query());
        endif;
        return $this;
    }


    public function write_log($file_name, $the_log = "", $ext = "txt"){
        $file_name = "{$file_name}" . date("m-d-y-h-i-s") . ".{$ext}";
        file_put_contents(LOG_PATH. "/{$file_name}", $the_log);
    } //

    // extending Multiresult
    public function init_m_sql(){
        $this->Data = array();
        $this->ResultSet = array();
        $this->mysqli = $this->db->conn_id;
    }

    // suporting multi query
    public function m_query($SqlCommand){
        /* execute multi query */
        if (mysqli_multi_query($this->mysqli, $SqlCommand)):

            $i = 0;

            do{

                 if ($result = $this->mysqli->store_result()){

                    while ($row = $result->fetch_assoc()){
                        $this->Data[$i][] = $row;
                    }
                    mysqli_free_result($result);

                }

                $i++;

            } while (@$this->mysqli->next_result());

        endif;

        return $this->Data;

    }// end of m_query support





    // reset function  need to run every
    // time the statement was called
    public function reset_result(&$res){
        @$res->next_result();
        @$res->free_result();
        return $res;
    }


    public function fetch_m_results(&$res, $convert_to_object = FALSE){
        $results = array("data" => array(), "total" => 0);
        
        if(0 !== (int)$this->db->error()['code']) return $results;

        if(empty($res)) return $results; 

        $the_response = array();
        isset($res[0][0]['total']) && $the_response = array(
            $res[1] ?? array(), 
            $res[0] ?? array()
        );

        isset($res[1][0]['total']) && $the_response = $res;

        if(empty($the_response)) return $results;
    
        if(empty($the_response) || (isset($the_response[1][0]['total']) && $the_response[1][0]['total'] === 0)) return $results;
        isset($the_response[1][0]['total']) && $results["total"] = $the_response[1][0]['total'];
        $results["data"] = isset($the_response[0]) ? $the_response[0] : array();

        // set status success
        $results['status'] = TRUE; 
        $results["message"] = "Success"; 

        if(empty($results['data'])) return $results;
        if($convert_to_object):
            foreach($results["data"] as $index => $single_result):
                $results["data"][$index] = (object)$single_result;
            endforeach;
        endif;

        return $results;
    }

    // generic function to fetch rsults
    public function fetch_results(&$res){

        $results = array();
        if(0 !== (int)$this->db->error()['code']) return $results;

        if(is_object($res) &&  is_object($res->result_id) && $res->num_rows() > 0):
            foreach($res->result() as $row):
                $results[] = $row;
            endforeach;
        endif;
		
        $this->reset_result($res);

        return $results;

    }

    public function no_db_error(){ return 0 === (int)$this->db->error()['code']; }


		

	public function get_auto_hash($length = null){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        NULL === $length && $length = 100;

        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $length; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
	
	
} ///
