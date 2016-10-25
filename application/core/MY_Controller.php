<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {



//    * all users
//    user registered user
//    editor editor
//    admin admin
    protected $access = array('*');


    public function __construct(){
        parent::__construct();
        $this->load->helper(array('my_helper','url'));
        $this->check_role();
        

    }

    public function check_role()
    {
        if($this->access !='*'){
        if(is_logged()){
            if(! $this->permission_check()){
                show_404();
            }
        }
        else {
            redirect('auth/login');
        }

        }
    }

    public function permission_check()
    {
        if($this->access == 'admin' || $this->access == 'user'){
            return true;
        }
        else{
            if(in_array($this->session->userdata['role'],$this->access)){
                return true;
            }



        }
    }



}