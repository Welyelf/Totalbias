<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scoring extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->auth->check(array("", ""));
        $this->load->model('Scoring_model', 'scoring_model');
    }

    public function index()
    {
        $input = $this->input->post();
        if ($input) {
            $id = $input['position'];
            unset($input['position']);
            $this->scoring_model->update($input, $id);
        }
        //$this->load->view('auth/login.php');
        $this->data['news_data'] = $this->scoring_model->get_details("news");
        $this->data['videos_data'] = $this->scoring_model->get_details("videos");
        $this->data['podcast_data'] = $this->scoring_model->get_details("podcasts");

        $this->load->view('layout/backend/master',$this->data);
    }


}