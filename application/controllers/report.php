<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('posts_model');
        $this->load->library('form_validation');
        $this->load->helper(array('typography','url','my_helper'));
        $this->data['report_form']='';




        $this->load->helper('url');

    }
    protected $access = array('admin','editor');

    public function index()
    {
        $this->data['title'] = 'Reports';
        $this->data['reports'] = $this->report_model->getAll();
        $this->template->view('reports_list_view',$this->data);
    }



}