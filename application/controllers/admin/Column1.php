<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Column1 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Links_model', 'links');
        $this->auth->check(array("", ""));

    }
    public function index()
    {
        //$this->load->view('auth/login.php');
        $this->data['column1'] = $this->links->get_all_c1();
        //$this->data['column2'] = $this->links->get_all_c2();
        //$this->data['column3'] = $this->links->get_all_c3();
        $this->load->view('layout/backend/master', $this->data);
    }

    public function add()
    {
        $input = $this->input->post();
        if ($input) {
            $input['datetime'] = date("m-d-Y h:i A");
            $input['img_path'] ="";
            if($input['id']!= ""){
                $id = $input['id'];
                unset($input['id']);
                $this->links->update($input, $id);
                echo "update";
            }else{
                unset($input['id']);
                $this->links->add($input);
                echo "add";
            }

        }
    }
    public function delete()
    {
        $id = $_POST['id'];
        if ($this->links->delete($id)) {
            echo  "nice";
        }
    }


}