<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','my_helper'));
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

                $userData = $this->auth_model->getUser($this->input->post('email'));
                $userData['logged_in'] = true;
                $this->session->set_userdata($userData);

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
        $avatar = array();
        $this->data['title'] = 'Register';
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]')
            ->set_rules('password','Password','required|min_length[4]')
            ->set_rules('password2','Re-enter Password','required|min_length[4]|matches[password]');
        $this->form_validation->set_error_delimiters('<p class = "error_message">', '</p>');




        if($this->form_validation->run()) {
            if($_FILES['file']['tmp_name']) {
                if ($ok=$this->_avatarUpload()) {
                    $avatar = $ok;


                } else {
                    $this->data['upload_error'] = $this->upload->display_errors('<p class = "error_message">', '</p>');
                    return $this->template->view('auth/register',$this->data);
                }

            }
            if ($this->auth_model->register($avatar)) {
                $userData = $this->auth_model->getUser($this->input->post('email'));
                $userData['logged_in'] = true;
                $this->session->set_userdata($userData);
                redirect('/');

            }

        }else{
            $this->template->view('auth/register',$this->data);

        }

    }

    public function logout()
    {
        $this->auth_model->logout();
        redirect('/');
    }

    public function _avatarUpload()
    {

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '300';
        $config['max_height']  = '300';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            if($this->_createAvatar($data)){
                return array('avatar'=>"/images/".$data['file_name']);
            }

        }
        return false;
    }

    public function _createAvatar($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image']	= $data['full_path'];
        $config['maintain_ratio'] = TRUE;
        $config['width']	= 30;
        $config['height']	= 30;

        $this->load->library('image_lib', $config);

        if($this->image_lib->resize()){
            return true;
        }
        return false;

    }


}