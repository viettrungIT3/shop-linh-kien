<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller{

    public function __construct(){

        parent::__construct();
        //$this->verify_authentication();

    }



    public function reset_password_success()
    {
        $this
            ->set_body_class("login-template")
            ->set_page_title("Your password has been reset")
            ->set_main_template("reset-password-success")
            ->render();
    }




}
