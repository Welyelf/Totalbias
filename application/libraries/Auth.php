<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{

    public function __construct()
    {
        $this->CI =& get_instance();

        // Required Libraries
        if (!class_exists('session')) {
            $this->CI->load->library('session');
        }
        // Required Configs
        $this->CI->config->load('auth');
    }
    public function check($roles, $ref_role = FALSE)
    {
        //Check if there is a logged in user
        if (!isset($this->CI->session->user)) {
            redirect(base_url($this->CI->config->item('auth_login')));
        } else {
                if($this->CI->session->user->role == "SuperAdmin"){
                    return TRUE;
                }else{
                    redirect(base_url("/administrator/column1"));


                }

        }
    }
    public function check_if_superadmin(){
        if($this->CI->session->user->role == "SuperAdmin"){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}