<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
    }
    public function index()
    {
        $this->load->view('auths/login.php');
    }
    public function login($error = FALSE)
    {
        $input = $this->input->post();

        if ($input) {
            $user = $this->users->get_details($input['username']);
            if ($user) {
                if ($this->bcrypt->check_password($input['password'], $user->password)) {
                    unset($user->password);
                    $this->session->set_userdata('user', $user);

                    redirect(base_url($this->config->item('auth_login_success')));
                    exit;
                }
            }else{
                $this->data['error'] = "Invalid Username and/or Password.";
            }
            $this->load->view('auths/login.php' ,$this->data);
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url($this->config->item('auth_login')));
    }
}