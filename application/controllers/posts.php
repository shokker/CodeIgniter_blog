<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
    }

    public function index(){
        $data['title'] = 'Posts';
        $data['posts'] = $this->posts_model->getAll();

        $this->template->view('posts_view',$data);

    }




}