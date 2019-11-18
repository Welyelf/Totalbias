<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Column3 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        //$this->load->view('auth/login.php');
        $this->load->view('layout/backend/master');
    }

}