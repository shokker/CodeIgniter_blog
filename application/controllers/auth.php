<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation');
        $this->load->model('auth_model');
        $this->data['valid_error'] = '';
        $this->data['report_form'] = '';

    }

    public function login(){
        $this->data['title'] = 'Login';

        $this->form_validation->set_rules('email','Email','required|valid_email')
                              ->set_rules('password','Password','required|min_length[4]');
        $this->form_validation->set_error_delimiters('<p class = "error_message">', '</p>');
        if($this->form_validation->run()){
            if($this->auth_model->login()) {

                echo "register and login";
                redirect('/');
            }
            else{
                // errror
                $this->data['valid_error'] = "wrong email or password";
                $this->template->view('auth/login',$this->data);
            }

        }
        else{

            $this->template->view('auth/login',$this->data);


        }

    }

    public function register()
    {
        $this->data['title'] = 'Register';
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]')
            ->set_rules('password','Password','required|min_length[4]')
            ->set_rules('password2','Re-enter Password','required|min_length[4]|matches[password]');
        $this->form_validation->set_error_delimiters('<p class = "error_message">', '</p>');

        if($this->form_validation->run() && $this->auth_model->register()){

            echo "register and login";

            redirect('/');

        }
        else{
            $this->template->view('auth/register',$this->data);

        }

    }


}