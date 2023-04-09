<?php

class Misc_model extends MY_Model{

    private $months = array(
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ); //

    private $audio_mimes = [

        'mid' => 'audio/midi',
        'midi' => 'audio/midi',
        'mp3' => array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
        'aif' => 'audio/x-aiff',
        'aiff' => 'audio/x-aiff',
        'aifc' => 'audio/x-aiff',
        'ram' => 'audio/x-pn-realaudio',
        'rm' => 'audio/x-pn-realaudio',
        'rpm' => 'audio/x-pn-realaudio-plugin',
        'ra' => 'audio/x-realaudio',
        'rv' => 'video/vnd.rn-realvideo',
        'wav' => array('audio/x-wav', 'audio/wave', 'audio/wav'),
        'mpeg' => 'video/mpeg',
        'mpg' => 'video/mpeg',
        'mpe' => 'video/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'avi' => 'video/x-msvideo',
        'movie' => 'video/x-sgi-movie'

    ];


    private $states = array(
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District of Columbia',
        'FL'=>'Florida',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming',
    );
    // return list of years
    public function get_years(){

        $current_year = (int)date('Y') + 1;

        $the_years  = array();
        for( $_ci = $current_year; $_ci > $current_year - 2; $_ci --  ):
            $the_years[] = $_ci;
        endfor;

        return $the_years;


    } //


    public function get_enrollment_years(){
        $res = $this->db->query("call states_list_enrollments()");
        return $this->process_results($res)->get_results();
    } //

    public function do_sql_test(){
        $res = $this->db->query("SELECT @@Global.time_zone, @@Session.time_zone;");
        return $this->fetch_results($res);
    }

    public function get_months(){

        return $this->months;

    } // months




    public function get_states(){

        $the_states = array();
        $res = $this->db->query("call states_list()");
        if($res->num_rows() > 0):
            foreach($res->result() as $row):
                $the_states[] = $row;
            endforeach;
        endif;

        $this->reset_result($res);

        return $the_states;

    }//


    public function get_states_list(){
        return $this->states;
    }




    // function to return options with date range
    // this week, this month, this year
    // next week, next month, next year
    public function get_date_range($type = "this week"){

        $result = array("from" => NULL, "to" => NULL);

        switch($type):

            case "this week":
                $day = date('w');
                $week_start = date('m-d-Y', strtotime('-'.$day.' days'));
                $week_end = date('m-d-Y', strtotime('+'.(6-$day).' days'));
                $result["from"] = $week_start;
                $result["to"]   = $week_end;
                break;

            case "next week":
                $day = date('w', strtotime("next week"));
                $week_start = date('m-d-Y', strtotime('-'.$day.' days'));
                $week_end = date('m-d-Y', strtotime('+'.(6-$day).' days'));
                $result["from"] = $week_start;
                $result["to"]   = $week_end;
                break;

            case "this month":
                $current_year = date("Y");
                $current_month = date("m");
                $number_of_days = date("t");

                $m_start = "1/{$current_month}/{$current_year}";
                $m_end = "{$number_of_days}/{$current_month}/{$current_year}";

                $result["from"] = $m_start;
                $result["to"]   = $m_end;

                break;

            case "next month":
                $next_month = strtotime("next month");
                $current_year = date("Y", $next_month);
                $current_month = date("m", $next_month);
                $number_of_days = date("t", $next_month);

                $m_start = "1/{$current_month}/{$current_year}";
                $m_end = "{$number_of_days}/{$current_month}/{$current_year}";

                $result["from"] = $m_start;
                $result["to"]   = $m_end;


                break;

            case "this year":
                $current_year       = date("Y");
                $number_of_days     = date("t", strtotime("1/12/{$current_year}"));
                $last_day_of_dec    = date("{$number_of_days}/12/{$current_year}");
                $result["from"]     = "01/01/{$current_year}";
                $result["to"]       = $last_day_of_dec;
                break;

            case "next year":
                $current_year       = date("Y", strtotime("next year"));
                $number_of_days     = date("t", strtotime("1/12/{$current_year}"));
                $last_day_of_dec    = date("{$number_of_days}/12/{$current_year}");
                $result["from"]     = "01/01/{$current_year}";
                $result["to"]       = $last_day_of_dec;
                break;


        endswitch;



        return $result;


    }//




    public function randomNumber($length){
        
        $min = 1 . str_repeat(0, $length-1);
        $max = str_repeat(9, $length);
        return mt_rand($min, $max);   
    }


    /*
     * @description: to lookup content type from array of  audio mimes and 
     * decide the extension
     * @param: string $the_type
     * @return string
     * */
    public function get_audio_ext_by_type($the_type = NULL){

        if(NULL === $the_type) return NULL;

        foreach($this->audio_mimes as $ext => $content_type):

            if( (is_array($content_type) && in_array($the_type, $content_type))
                || $the_type === $content_type):
                return $ext;
            endif;

        endforeach;

        return NULL;

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
		->get_results();;
    }


}
