<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Column1 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->auth->check(array("", ""));
        $this->load->model('Links_model', 'links');
        $this->load->model('Scoring_model', 'scoring_model');
        $this->load->model('Headline_model', 'headline');

    }
    public function index()
    {
        //$this->load->view('auth/login.php');
        $articles = $this->links->get_all_article();
        $today = date("d-m-Y h:i A");

        $news_data = $this->scoring_model->get_details("news");

        foreach ($articles as $article){

            $start_dates = date("Y-m-d", strtotime($article->datetime));
            $end_dates = date("Y-m-d", strtotime($today));

            $start_date = strtotime($start_dates);
            $end_date = strtotime($end_dates);
            $diff = ($end_date - $start_date) /60 /60 /24;

            if($diff > $news_data->exc_days_older){
                $input = $this->input->post();
                $id = $article->id;
                $input['is_archive'] = "1";
                $this->links->update($input, $id);
            }
        }


        $this->data['news'] = $this->links->get_all_articles(1);
        $this->data['videos'] = $this->links->get_all_articles(2);
        $this->data['podcasts'] = $this->links->get_all_articles(3);
        $this->data['headlines'] = $this->headline->get_all();

        $this->data['archives'] = $this->links->get_all_archived();
        $this->load->view('layout/backend/master', $this->data);
    }

    public function add()
    {
        $input = $this->input->post();
        if ($input) {
            $input['datetime'] = date("d-m-Y h:i A");
            if($input['id']!= ""){
                $id = $input['id'];
                unset($input['id']);
                $input['user_added'] = $this->session->user->fullname;
                $this->links->update($input, $id);
                echo "update";
            } else{
                unset($input['id']);
                $input['user_added'] = $this->session->user->fullname;
                $this->links->add($input);
                echo "add";
            }
        }
    }

    public function delete_archived()
    {
        $id = $_POST['id'];
        if ($this->links->delete_archive($id)) {
            echo  "nice";
        }
    }
    public function delete()
    {
        $id = $_POST['id'];
        if ($this->links->delete($id)) {
            echo  "nice";
        }
    }

    public function upload_pic(){
        $input = $this->input->post();
        if ($input) {
            $this->load->library('upload');

            $config['upload_path'] ='./assets/img';
            $config['overwrite'] = true;
            $config['encrypt_name'] = TRUE;
            $config['allowed_types']='jpg|png';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                //$this->data['file'] = $this->upload->display_errors();
                $this->data['error'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $image_path = '/assets/img/' . $upload_data['file_name'];
                echo $image_path;
            }
        }
    }

    public function get_file_content(){
        $url = $_POST['url_data'];

        $screen_shot_json_data = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$url&screenshot=true");
        $screen_shot_result = json_decode($screen_shot_json_data,true);
        $screen_shot = $screen_shot_result['screenshot']['data'];
        $screen_shot = str_replace(array('_','-'), array('/','+'),$screen_shot );
        echo $screen_shot;
        //$screen_shot_image = "<img src=\"data:image/jpeg;base64,".$screen_shot."\" class='img-responsive' />";
    }


}