<?php
/**
 * Created by PhpStorm.
 * User: Welyelf
 * Date: 11/16/2019
 * Time: 9:06 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Totalbias extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Links_model', 'links');

    }

    public function index()
    {
        $this->data['column1'] = $this->links->get_all_c1();
        $this->data['column2'] = $this->links->get_all_c2();
        $this->data['column3'] = $this->links->get_all_c3();
        $this->load->view('home',$this->data);
    }

}