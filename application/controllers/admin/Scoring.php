<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scoring extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->auth->check(array("", ""));
    }


    public function index()
    {
        //$this->load->view('auth/login.php');
        $this->load->view('layout/backend/master');
    }

}