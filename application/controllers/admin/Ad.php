<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->auth->check(array("", ""));
        $this->load->model('Ad_model', 'ad_model');
    }

    public function index()
    {
        $input = $this->input->post();
        if ($input) {

        }
        $this->data['users'] = $this->ad_model->get_all();
        $this->load->view('layout/backend/master',$this->data);
    }
    public function add()
    {
        $input = $this->input->post();
        if ($input) {
            if($input['id']!= ""){
                $id = $input['id'];
                unset($input['id']);
                $this->ad_model->update($input, $id);
                echo "update";
            }else{
                unset($input['id']);
                $this->ad_model->add($input);
                echo "add";
            }

        }
    }
    public function delete()
    {
        $id = $_POST['id'];
        if ($this->ad_model->delete($id)) {
            echo  "nice";
        }
    }

}