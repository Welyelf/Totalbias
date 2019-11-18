<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('auth/login.php');
    }
    public function login($error = FALSE)
    {
        $input = $this->input->post();

        if ($error == "subscription-error") {
            $this->data['error'] = "Login Required. You already have an existing subscription.";
        }

        if ($input) {

            $user = $this->users->get_details($input['username']);

            if ($user) {
                if ($this->bcrypt->check_password($input['password'], $user->password)) {
                    unset($user->password);
                    $this->session->set_userdata('user', $user);
                    if ($error == "subscription-error") {
                        redirect(base_url('user/account'));
                        exit;
                    }
                    if ($user->role == "User") {
                        redirect(base_url('user/account'));
                    } else {
                        redirect(base_url($this->config->item('auth_login_success')));
                    }
                    exit;
                }
            }

            $this->data['error'] = "Invalid Username and/or Password.";
        }


        $this->load->view('layout/backend/master.php', $this->data);
    }
}