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

    public function get_cloumnA_data(){
        $rating = $_POST['rating'];
        $links= $this->links->get_rating_data($rating);

        $data_links = array();
        foreach ($links as $data_link) {
            $arr = array();

            $arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12'><div class='panel-body'><a target='_blank' href=' $data_link->url'><h4> $data_link->title  </h4></a><small id='publisher'><i>$data_link->publisher</i></small></div></div></div>";
            $arr['column_num'] = $data_link->column_num;
            //$arr['publisher'] = $data_link->publisher;
            //$arr['url'] = $data_link->url;

            $data_links[] =  $arr;
        }
        echo json_encode($data_links);
    }

}