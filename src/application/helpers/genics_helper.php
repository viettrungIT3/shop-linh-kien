<?php

if(!function_exists("__")):
    function __($_text, $data = NULL){
        $__ci =& get_instance();
        $__ci->load->helper("language");
        $__ci->lang->load("general");

        $the_text = $__ci->lang->line($_text);

        FALSE === $the_text && $the_text = $_text;

        preg_match('/\%[ds]/', $the_text) && 
            NULL !== $data &&
            $the_text = vsprintf($the_text, $data);

        return $the_text;
    } // 
endif;

if(!function_exists("get_csv_url")){

    function get_csv_url(){

        $the_url = $_SERVER['PHP_SELF'];
        $request_uri = explode("?", $_SERVER['REQUEST_URI']);
        $the_url = $request_uri[0];
        $the_url .=".json";

        isset($request_uri[1]) && $the_url .="?{$request_uri[1]}";

        return base_url($the_url);

    }

} // 

if(!function_exists("genics_get_value")):

    function genics_get_value($data = NULL, $key = "", $default = "", $echo = TRUE){

        // if this one is an object
        !is_array($data) && $data = (array)$data;

        $value = "";
        (
            (NULL === $data || "" === $key) ||
            (
                NULL !== $data    && 
                ""!== $key      && 
                !isset($data[$key])
            )
        ) &&
        $value = ("" !== $default ? $default : "");
        NULL !== $data && 
        ""!== $key     && 
        isset($data[$key]) &&
        $value = $data[$key];

        $value = preg_replace('/^(\d{4})\-(\d{1,})\-(\d{1,})$/', "$2/$3/$1", $value);

        if($echo): echo $value; return TRUE; endif;

        return $value;

    }// endof function to get default values

endif;

if(!function_exists("load_css")):

    function load_css($the_path = NULL, $echo = FALSE, $fixed_path = FALSE){

        global $css_stacks; 
        null === $css_stacks && $css_stacks = [];

        if(in_array($the_path, $css_stacks)) return "";
        
        $the_file = ASSETS_PATH . "css/" . $the_path . ".css";

        $fixed_path && $the_file = ASSETS_PATH . "/" . $the_path . ".css";

        if(!file_exists($the_file)) return NULL;

        $css_stacks[] = $the_path;

        $the_content = file_get_contents($the_file);

        if($echo): echo "<style>{$the_content}</style>"; return $this; endif;

        return $the_content;

    } // load css


endif;
if(!function_exists("load_script")):

    function load_script($the_path = NULL, $defer = FALSE, $echo = FALSE){

        global $js_stacks; 
        NULL === $js_stacks && $js_stacks = [];

        if(in_array($the_path, $js_stacks)) return "";

        $file_name = $the_path . ".js";

        $file_path = "js/{$file_name}";
        $the_file = ASSETS_PATH . $file_path;

        

        if(!file_exists($the_file)) return NULL;

        $js_stacks[] = $the_path;

        if($defer):
            $the_uri = base_url("public/theme/{$file_path}");
            $the_content = "<script href='{$the_uri}' defer></script>";
            if($echo): echo $the_content; return $this; endif;
            return $the_content;
        endif;

        $the_content = file_get_contents($the_file);

        if($echo): echo "<script>{$the_content}</script>"; return $this; endif;

        return $the_content;

    }  // end of function to load script

endif;
if(!function_exists("load_lib")):

    function load_lib($the_path = NULL, $defer = FALSE, $echo = FALSE){

        global $js_stacks; 
        NULL === $js_stacks && $js_stacks = [];

        if(in_array($the_path, $js_stacks)) return "";

        $file_name = $the_path;

        $file_path = "libs/{$file_name}";
        $the_file = ASSETS_PATH . $file_path;

        

        if(!file_exists($the_file)) return NULL;

        $js_stacks[] = $the_path;

        if($defer):
            $the_uri = base_url("public/theme/{$file_path}");
            $the_content = "<script href='{$the_uri}' defer></script>";
            if($echo): echo $the_content; return $this; endif;
            return $the_content;
        endif;

        $the_content = file_get_contents($the_file);

        if($echo): echo "<script>{$the_content}</script>"; return $this; endif;

        return $the_content;

    }  // end of function to load script

endif;

if(!function_exists("get_assets_uri")):
    function get_assets_uri($the_path = NULL){
        if(NULL === $the_path || empty($the_path)) return base_url("/public/theme");
        return base_url("public/theme/{$the_path}");
    }
endif;

if(!function_exists("get_script_uri")):
    function get_script_uri($the_path = NULL){
        if(NULL === $the_path || empty($the_path)) return base_url("/public/theme/js");
        $the_path = "{$the_path}.js";
        return base_url("public/theme/js/{$the_path}");
    }
endif;
if(!function_exists("get_media_uri")):

    function get_media_uri($the_path = NULL){

        if(NULL  === $the_path) return NULL;

        $file_name = $the_path;

        $file_path = "images/{$file_name}";

        $the_file =  ASSETS_PATH . $file_path;

        if(!file_exists($the_file)) return NULL;
        return base_url("public/theme/{$file_path}");

    } // end of function get media uri

endif;

if(!function_exists("get_media_path")):

    function get_media_path($the_path = NULL){

        if(NULL  === $the_path) return NULL;
        $file_name = $the_path;

        $file_path = "images/{$file_name}";
        $the_file =  ASSETS_PATH . $file_path;

        if(!file_exists($the_file)) return NULL;
        return $the_file;

    } // end of function to get css path

endif;

if(!function_exists("data_to_csv")):

    function data_to_csv($data = NULL){
        if(NULL === $data) return NULL;
        $handler = fopen("php://temp", "rw");
        // write header 
        fputcsv($handler, array_keys(current($data)));

        foreach($data as $single_row):
            fputcsv($handler, $single_row);
        endforeach;
        // rewind the cursor to the begining of file 
        rewind($handler);
        $csv = stream_get_contents($handler);
        fclose($handler);

        return $csv;
    } // end of function

endif;



if(!function_exists("format_phone")):
    function format_phone($string = ""){
        $string = preg_replace('/[\-\.\s\(\)]*/', '', $string);
        return preg_replace('/(\d{3})(\d{3})(\d{4,})/', "($1) $2 - $3", $string);
    }
endif;

if(!function_exists("get_csv_url")){

    function get_csv_url(){

        $the_url = $_SERVER['PHP_SELF'];
        $request_uri = explode("?", $_SERVER['REQUEST_URI']);
        $the_url = $request_uri[0];
        $the_url .=".json";

        isset($request_uri[1]) && $the_url .="?{$request_uri[1]}";

        return base_url($the_url);

    }

} // 

if(!function_exists("text_to_key")):
    function text_to_key($text){
        return strtolower(
            preg_replace('/\s/', '-', $text)
        );
    }
endif;

if(!function_exists("is_requesting_json")):
    function is_requesting_json(){
        return preg_match('/\.json/',$_SERVER['REQUEST_URI']);
    }
endif;

if(!function_exists("genics_has_error")):

    function genics_has_error($data = NULL, $key = "", $echo = TRUE){

        $value = "has-error";


        (!isset($data[$key]) || empty($data[$key])) &&
            $value = "";

         if($echo): echo $value; return TRUE; endif;

         return $value;

    }// endof function to get default values

endif;


if(!function_exists("get_request_log_path")):

    function get_request_log_path(){

        $file_name = date('Ymd') . "-request-log.txt";
        $the_path = LOG_PATH . $file_name;
        if(!file_exists($the_path)) file_put_contents($the_path, "");
        return  $the_path;

    }

endif;
if(!function_exists("cli_color")):
    function cli_color($in_char_color = "default", $in_char_text){
        $the_string = $in_char_text;
        $colors =
            [
                "default" => 39,
                "black" => 30,
                "red" => 31,
                "green" => 32,
                "yellow" => 33,
                "blue" => 34,
                "magenta" => 35,
                "cyan" => 36,
                "light gray" => 37,
                "dark gray" => 90,
                "light red" => 91,
                "light green" => 92,
                "light yellow" => 93,
                "light blue" => 94,
                "light magenta" => 95,
                "light cyan" => 96,
                "white" => 97,
            ];

        $color_code = 39;

        isset($colors[$in_char_color]) && $color_code = $colors[$in_char_color];
        return "\e[{$color_code}m{$in_char_text}\e[39m";

    }
endif;

if(!function_exists("config_to_text_choices")):

    // function to convert array with key into string
    // array should be simple object with key => value
    function config_to_text_choices($name = NULL){
        if(NULL === $name) return "";

        $template = [];
        $the_man =& get_instance();
        $the_items = $the_man->config->item($name) ?? NULL;
        foreach($the_items as $k => $j):
            $template[] = "$k: $j";
        endforeach;

        if(empty($template)) return "";

        return implode(", ", $template);
        
    }



endif;

if(!function_exists("_svg")):

    function _svg($input_name = NULL){
        if(NULL === $input_name) return "";
        $path = ASSETS_PATH . "/images/{$input_name}.svg";
        if(file_exists($path)) return "<span class='icon'>" . file_get_contents($path) . "</span>";
        return "";
    }
endif;


if(!function_exists("hash_password")):
    function hash_password($string = ""){
        return md5($string);
    }
endif;
