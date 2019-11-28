<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model', 'settings_model');
        $this->auth->check(array("", ""));
    }

    public function index()
    {
        //$this->load->view('auth/login.php');
        $input = $this->input->post();
        if ($input) {
            foreach ($input as $key => $value) {
                $input[$key] = html_entity_decode($value);
            }
            $this->settings_model->update($input);
        }
        $this->data['setting'] = $this->settings_model->get_all_admin();
        $this->load->view('layout/backend/master', $this->data);
    }
    public function add($id=NULL)
    {
        if (isset($id)) {
            $this->data['setttings_data'] = $this->settings_model->val($id, TRUE);
            //$this->data['setttings_data'] = $this->settings_model->get_details($id);
        }else{
            $this->data['setttings_data']="";
        }

        $input = $this->input->post();

        if ($input) {
            if (isset($id)) {
                $this->settings_model->edit($input);
            } else {
                $this->settings_model->add($input);
            }
            // Redirect to Settings page.
            redirect (base_url('/administrator/settings'));
        }

        $this->load->view('layout/backend/master',$this->data);
    }

}