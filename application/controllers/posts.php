<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
    }

    public function index(){
        $data['title'] = 'Posts';
        $data['posts'] = $this->posts_model->getAll();

        $this->template->view('posts_view',$data);

    }
    public function addPost()
    {
        $this->form_validation->set_rules('title','Title','required|min_length[4]')
            ->set_rules('text','Text','required|');

        $this->form_validation->set_error_delimiters('<p class = "error_message">','</p>');

        $data['title'] = 'Add post';
        $data['db_error'] = '';
        If($this->form_validation->run()){
            if($this->posts_model->createPost()){

                redirect('posts');

            }else{
                $data['db_error'] = '<p class="error_message"> Whoops Something Went Wrong!!</p>';
                $this->template->view('addpost_view',$data);
            }

        }else{
            $this->template->view('addpost_view',$data);

        }

    }




}