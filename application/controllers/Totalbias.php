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
        $this->load->model('Hits_model', 'hits_model');
        $this->load->model('Scoring_model', 'scoring_model');
        $this->load->model('Ad_model', 'ad_model');
        $this->load->model('Headline_model', 'headline');
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
		//strtotime(date('d-M-Y'))

		$today = date("d-M-Y");
		if($this->session->visited !== "1"){
			if(empty($this->hits_model->get_today_hits())) {
				$this->hits_model->add(1);
			}else{
				$today_hits = $this->hits_model->get_today_hits();
				//echo $today_hits->count;
				$this->hits_model->update_count($today_hits->count + 1);
				//echo "naay today";
			}
			$this->session->set_userdata('visited', '1');
		}else{
			//$today_hits = $this->hits_model->get_today_hits();
			//echo $today_hits->count;
		}
        $this->data['ads'] = $this->ad_model->get_all_active();
        $this->data['headlines'] = $this->headline->get_all();

        $this->load->view('home', $this->data);
    }

    public function get_ad_top_data(){
        $rating = $_POST['rating'];
        $ads = $this->ad_model->get_ad_specific_rating($rating);
        $data_ads = array();

        foreach ($ads as $data_ad) {
            $arr = array();
            $arr['ad_value'] = $data_ad->ad_value;
            $data_ads[] =  $arr;
        }
        echo json_encode($data_ads);
    }
    public function get_ad_bottom_data(){
        $rating = $_POST['rating'];
        $ads = $this->ad_model->get_bottom_ads($rating);
        $data_ads = array();

        foreach ($ads as $data_ad) {
            $arr = array();
            $arr['ad_value'] = $data_ad->ad_value;
            $arr['ad_position'] = $data_ad->ad_position;
            $data_ads[] =  $arr;
        }
        echo json_encode($data_ads);
    }
    public function get_cloumnA_data(){

        $settings = $this->settings_model->get_all();
        foreach ($settings as $setting) {
            $this->settings[$setting->name] = $setting->value;
        }

        //$setting= (object)$this->settings;

        $news_data = $this->scoring_model->get_details("news");
        //$videos_data = $this->scoring_model->get_details("videos");
        //$podcast_data= $this->scoring_model->get_details("podcasts");


        if($news_data->sort_first == 1){
            $sort_date = "priority";
        }else if($news_data->sort_first == 2){
            $sort_date = "rating";
        }else if($news_data->sort_first == 3){
            $sort_date = "column_num";
        }else if($news_data->sort_first == 4){
            $sort_date = "id";
        }

        $rating = $_POST['rating'];
        $links = $this->links->get_rating_data($rating,NULL,$sort_date,$news_data->sort_first);
        $data_links = array();

        $ads = $this->ad_model->get_all_active_ratings($rating);
        $numbers = array();
        foreach ($ads as $ad){
            array_push($numbers,$ad->id);
            $value = $ad->ad_value;
            $col = $ad->ad_column;
        }

       // echo count($numbers);

        $ctr = 0;
        $counter=0;
        foreach ($links as $data_link) {

            if ($ctr % 5 == 0) {
                if($counter < count($numbers)) {
                    //$col = rand(1, 3);
                    $gen_num = rand(0, count($numbers));
                    if (count($numbers) == 1) {
                        $gen_num = 0;
                    } else if ($gen_num == count($numbers)) {
                        $gen_num = $gen_num - 1;
                    }
                    if (isset($col) && $col == $data_link->column_num) {
                        $get_ads = $this->ad_model->get_ad_details($numbers[$gen_num], $rating);
                        $arr['title'] = "<div style='margin-bottom: 10px;'>" . $get_ads->ad_value . "</div>";
                        $arr['column_num'] = $get_ads->ad_column;
                        $data_links[] = $arr;
                        $counter++;
                    }
                }
            }

            $arr = array();

            $title_css = (array) json_decode($data_link->title_css,TRUE);
            $title_css_assign = "style=";
            $title_css_assign_hover="";
            $author="";


            if(isset($title_css['font_size'])){
                $title_css_assign = $title_css_assign ."font-size:".$title_css['font_size']."px!important;";
            }
            if(isset($title_css['font_color'])){
                $title_css_assign = $title_css_assign ."color:".$title_css['font_color']."!important;";
                $title_css_assign_hover = "style='a:hover,a:focus{color:".$title_css['font_color']."!important}'";
            }
            if(isset($title_css['hover_color'])){
                //$title_css_assign_hover = "style='a:hover,a:focus{color:".$title_css['font_color']."!important}'";
            }

            if(!empty($data_link->author)){
                $author=' - '. $data_link->author;
            }

            $author_css = (array) json_decode($data_link->author_css,TRUE);
            $author_css_assign = "style=";
            $author_css_assign_hover="";
            if(isset($author_css['font_size'])){
                $author_css_assign = $author_css_assign ."font-size:".$author_css['font_size']."px!important;";
            }
            if(isset($author_css['font_color'])){
                $author_css_assign = $author_css_assign ."color:".$author_css['font_color']."!important;";
            }
            $publisher_css = (array) json_decode($data_link->publisher_css,TRUE);
            $publisher_css_assign = "style=";
            $publisher_css_assign_hover="";
            if(isset($publisher_css['font_size'])){
                $publisher_css_assign = $publisher_css_assign ."font-size:".$publisher_css['font_size']."px!important;";
            }
            if(isset($publisher_css['font_color'])){
                $publisher_css_assign = $publisher_css_assign ."color:".$publisher_css['font_color']."!important;";
            }


            if($data_link->img_display == 1){
                $arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12 responsives'><a href=' $data_link->url ' target='_blank' ><img src='$data_link->img_path' alt='$data_link->title' class='responsive'/></a><br><div class='panel-body'> <a target='_blank' class='hover_effects' $title_css_assign_hover href=' $data_link->url '  ><h4 class='link_title'  $title_css_assign > $data_link->title  </h4></a>
                <div  id='publisher2'><small id='publisher' $publisher_css_assign><i>$data_link->publisher</i></small> <small ><i id='author' $author_css_assign > $author </i></small></div> </div></div></div>";
            }
            else{
                $arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12 responsives'><div class='panel-body'> <a class='hover_effects' $title_css_assign_hover href=' $data_link->url ' target='_blank' ><h4 class='link_title'  $title_css_assign > $data_link->title  </h4></a>
                <div  id='publisher2'><small id='publisher' $publisher_css_assign><i>$data_link->publisher</i></small> <small ><i id='author' $author_css_assign > $author </i></small></div> </div></div></div>";
            }

            //$arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12'><img src='/assets/img/11.jpg' alt='Nature' class='responsive'/><br><div class='panel-body'> <a class='hover_effects' $title_css_assign_hover href=' $data_link->url '  ><h4 class='link_title'  $title_css_assign > $data_link->title  </h4></a>
            //<small id='publisher' $publisher_css_assign><i>$data_link->publisher</i></small> <small ><i id='author' $author_css_assign > $author </i></small> </div></div></div>";
            //$arr['title'] = "<div class='row' id='columnRow'><div class='col-12 col-md-12'><div class='panel-body'><a target='_blank' href=' $data_link->url'><h4> $data_link->title </h4></a><small id='publisher'><i>$data_link->publisher</i></small></div></div></div>";
            $arr['column_num'] = $data_link->column_num;
            $data_links[] =  $arr;

            $ctr++;
        }
        echo json_encode($data_links);
    }

}