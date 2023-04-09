<?php
class Welcome extends MY_Controller{
    public function index(){

        return $this->success("Welcome to GW Export")->render_json();
    }

}
