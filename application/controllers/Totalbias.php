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
        $this->load->model('Settings_model', 'settings_model');

    }

    public function index()
    {
        $settings = $this->settings_model->get_all();
        foreach ($settings as $setting) {
            $this->settings[$setting->name] = $setting->value;
        }
        $this->data['settings'] = (object)$this->settings;
        //$setting= (object)$this->settings;
        //echo $setting->column1_limit;


        $this->load->view('home', $this->data);
    }

    public function get_cloumnA_data(){

        $settings = $this->settings_model->get_all();
        foreach ($settings as $setting) {
            $this->settings[$setting->name] = $setting->value;
        }
        $setting= (object)$this->settings;

        $rating = $_POST['rating'];
        $links= $this->links->get_rating_data($rating,NULL);

        $data_links = array();
        foreach ($links as $data_link) {
            $arr = array();

            $title_css = (array) json_decode($data_link->title_css,TRUE);
            $title_css_assign = "style=";
            $title_css_assign_hover="";
            $author="";


            if(isset($title_css['font_size'])){
                $title_css_assign = $title_css_assign ."font-size:".$title_css['font_size']."px;";
            }
            if(isset($title_css['font_color'])){
                $title_css_assign = $title_css_assign ."color:".$title_css['font_color'].";";
            }
            if(isset($title_css['hover_color'])){
                $title_css_assign_hover = "style='a:hover,a:focus{color:".$title_css['hover_color']."!important}'";
            }


            if(!empty($data_link->author)){
                $author=' - '. $data_link->author;
            }


            $author_css = (array) json_decode($data_link->author_css,TRUE);
            $author_css_assign = "style=";
            $author_css_assign_hover="";
            if(isset($author_css['font_size'])){
                $author_css_assign = $author_css_assign ."font-size:".$author_css['font_size']."px;";
            }
            if(isset($author_css['font_color'])){
                $author_css_assign = $author_css_assign ."color:".$author_css['font_color'].";";
            }


            $publisher_css = (array) json_decode($data_link->publisher_css,TRUE);
            $publisher_css_assign = "style=";
            $publisher_css_assign_hover="";
            if(isset($publisher_css['font_size'])){
                $publisher_css_assign = $publisher_css_assign ."font-size:".$publisher_css['font_size']."px;";
            }
            if(isset($publisher_css['font_color'])){
                $publisher_css_assign = $publisher_css_assign ."color:".$publisher_css['font_color'].";";
            }

            $arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12'><div class='panel-body'><a class='hover_effects' $title_css_assign_hover target='_blank' href=' $data_link->url '  ><h4  $title_css_assign > $data_link->title  </h4></a>
            <small id='publisher' $publisher_css_assign><i>$data_link->publisher</i></small> <small><i $author_css_assign > $author </i></small> </div></div></div>";
            //$arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12'><div class='panel-body'><a target='_blank' href=' $data_link->url'><h4> $data_link->title </h4></a><small id='publisher'><i>$data_link->publisher</i></small></div></div></div>";
            $arr['column_num'] = $data_link->column_num;
            $data_links[] =  $arr;
        }
        echo json_encode($data_links);
    }

}