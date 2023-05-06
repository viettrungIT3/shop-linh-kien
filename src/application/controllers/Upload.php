<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $name_file = "";
        if (isset($_FILES['file'])) {
            $fileNameParts = explode('.', $_FILES['file']['name']);
            $ext = end($fileNameParts);
            $name_file = md5(time()) . "." . $ext;
            $upload_result = $this->upload('file', $name_file);
            if (isset($upload_result['error'])) {
                return $this->failed($upload_result['error'])->render_json();
            }
        }

        return $this
            ->success("Upload image successful!")
            ->set("data", $name_file)
            ->render_json();
    }
}