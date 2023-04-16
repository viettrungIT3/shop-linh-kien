<?php

class Misc_model extends MY_Model{




    public function do_sql_test(){
        $res = $this->db->query("SELECT @@Global.time_zone, @@Session.time_zone;");
        return $this->fetch_results($res);
    }

    public function get_months(){

        return $this->months;

    } // months


    public function randomNumber($length){
        
        $min = 1 . str_repeat(0, $length-1);
        $max = str_repeat(9, $length);
        return mt_rand($min, $max);   
    }


	public function send_mail($input_to,$mail_subject, $content ){

    
        // usign this key to communicate
        $sg_api_key = $_ENV['SG_API_KEY'];

        // sendgrid template id
        // $sg_id_template = $template_id;

        // sendgrid api url
        $sp_api_url="https://api.sendgrid.com/v3/mail/send";

        // sending from 
        $sending_from = "noreply@vitalinteractive.com";

        // sending to
        $sending_to = $input_to;


        $sending_data = [

            "from" => [

                "email" => $sending_from

            ], 
			"subject" => $mail_subject,
			// "template_id" => $sg_id_template,
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" =>  $sending_to
                        ]
						]
						// "dynamic_template_data" => $dynamic_data
                ]
            ], 

			"content" => array(
				array(
					"type" => "text/html",
					"value" => $content
				)
			)

        ];


        $ch = curl_init($sp_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$sg_api_key}"
        ]);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sending_data));

        $response  = curl_exec($ch);
		$err = curl_error($ch);
	
        if(FALSE === $response):
            return $this
                        ->failed("Failed to send out email")
                        ->set("data", curl_error($ch))
						->get_results();
        endif;

        return $this->success("Email has been sent to {$sending_to}")
		->get_results();
    }


}
