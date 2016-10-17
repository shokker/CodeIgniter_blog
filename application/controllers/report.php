<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('posts_model');
        $this->load->library('form_validation');
        $this->load->helper('url');

    }

    public function createReport(){

        $this->form_validation->set_rules('title','Title','required')
                              ->set_rules('email','Email','required|valid_email')
                              ->set_rules('text','text','required');
        $this->form_validation->set_error_delimiters('<p class = "error_message">','</p>');

        if($this->form_validation->run()){
            if($this->report_model->createReport()){
                $this->session->set_flashdata('report_message','Report send');

                redirect('posts');

            }else{
                $this->session->set_flashdata('report_message','whoops something ent wrong :(');

                redirect('posts');
            }

        }else{
            $data['title'] = 'Posts';
            $data['posts'] = $this->posts_model->getAll();
            $data['report_form'] = $this->load->view('report_view','',true);
            $this->template->view('posts_view',$data);
        }






        

    }


}