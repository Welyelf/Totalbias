<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->auth->check(array("", ""));
		 $this->load->model('Hits_model', 'hits_model');
    }

	public function index()
    {
		$this->data['total_this_year'] = $this->hits_model->get_year_record();
		$this->data['total_this_month'] = $this->hits_model->get_month_record();
		$this->data['total_this_day'] = $this->hits_model->get_today_hits();
		
		
		
		$this->load->view('layout/backend/master', $this->data);
    }

}