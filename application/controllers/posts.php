<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'typography', 'my_helper'));
        $this->data['report_form'] ='';
        $this->data['db_error'] = '';
//        print_r($this->session->all_userdata());
//        die();

    }

    public function index()
    {

        $this->data['title'] = 'Posts';
        $this->data['posts'] = $this->posts_model->getAll();
        $this->data['report_form'] = $this->load->view('report_view', '', true);

        $this->template->view('posts_view', $this->data);

    }

    public function addPost()
    {

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]')
            ->set_rules('text', 'Text', 'required|');

        $this->form_validation->set_error_delimiters('<p class = "error_message">', '</p>');

        $this->data['title'] = 'Add post';
        If ($this->form_validation->run()) {
            if ($this->posts_model->createPost()) {

                redirect('posts');

            } else {
                $this->data['db_error'] = '<p class="error_message"> Whoops Something Went Wrong!!</p>';
                $this->template->view('addpost_view', $this->data);
            }

        } else {
            $this->template->view('addpost_view', $this->data);

        }

    }

    public function showPost($url)

    {

        $this->data['title'] = $this->posts_model->showPost($url)->title;
        $this->data['text'] = $this->posts_model->showPost($url)->text;
        $this->data['date'] = $this->posts_model->showPost($url)->date;
        $this->template->view('post_view', $this->data);
    }
}