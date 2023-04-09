<?php
/*
 * to provide interface to send email using 
 * apikey and template  id
* */
class Sendgrid {
	private $ci;
    private $sendgrid;

	public function __construct() {
        $this->ci =& get_instance();
    }

    public function send($input_to,$mail_subject, $content ,$template_id, $dynamic_data){

    
        // usign this key to communicate
        $sg_api_key = $_ENV['SG_API_KEY'];

        // sendgrid template id
        $sg_id_template = $template_id;

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
			"template_id" => $sg_id_template,
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" =>  $sending_to
                        ]
						],
						"dynamic_template_data" => $dynamic_data
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
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}

    }
        
}
