<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->auth->check(array("", ""));

    }
    public function index()
    {
        $this->data['users'] = $this->users->get_all();
        $this->load->view('layout/backend/master', $this->data);
    }

    public function add()
    {
        $input = $this->input->post();
        if ($input) {
            $input['password'] = $this->bcrypt->hash_password($input['password']);
            if($input['id']!= ""){
                $id = $input['id'];
                unset($input['id']);
                $this->users->update($input, $id);
                echo "update";
            }else{
                unset($input['id']);
                $this->users->add($input);
                echo "add";
            }

        }
    }
    public function delete()
    {
        $id = $_POST['id'];
        if ($this->users->delete($id)) {
            echo  "nice";
        }
    }


}