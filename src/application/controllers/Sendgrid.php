<?php
/*
 * to provide interface to send email using 
 * apikey and template  id
* */
class Sendgrid extends MY_Controller{
    public function send(string $input_to = NULL){

        if(NULL === $input_to) {
			return $this
			->failed("Missing input email")
			->render_json();
		}

        // usign this key to communicate
        $sg_api_key = $_ENV['SG_API_KEY'];

        // sendgrid template id
        $sg_id_template = $_ENV['SG_ID_TEMPLATE'];

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
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" =>  $sending_to
                        ]
                    ], 

                    "dynamic_template_data" => [

                        "first_name" => "Phuc", 
                        "link" => "http://thelink.com",
                        "link_label"=> "Reset Password"

                    ]     
                    
                ]
            ], 

            "template_id" => $sg_id_template

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

        $res = curl_exec($ch);

        if(FALSE === $res):
            return $this
                        ->failed("Failed to send out email")
                        ->set("data", curl_error($ch))
                        ->render_json();
        endif;

        return $this->success("Email has been sent to {$sending_to}")
                    ->render_json();

    }
        
}
