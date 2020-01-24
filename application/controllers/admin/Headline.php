<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Headline extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->auth->check(array("", ""));
        $this->load->model('Headline_model', 'headline');
    }

    public function index()
    {
        $input = $this->input->post();
        if ($input) {

        }
        $this->data['users'] = $this->headline->get_all();
        $this->load->view('layout/backend/master',$this->data);
    }
    public function add()
    {
        $input = $this->input->post();
        if ($input) {
            if($input['id']!= ""){
                $id = $input['id'];
                unset($input['id']);
                $this->headline->update($input, $id);
                echo "update";
            }else{
                unset($input['id']);
                $this->headline->add($input);
                echo "add";
            }

        }
    }
    public function delete()
    {
        $id = $_POST['id'];
        if ($this->headline->delete($id)) {
            echo  "nice";
        }
    }

}