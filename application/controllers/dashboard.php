<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('EditorLib');
        $this->load->helper(array('url','my_helper'));
        $this->data['report_form'] = '';
        $this->data['content_users'] = '';
    }
    protected $access = array('admin','editor');

    public function index(){
        $this->data['title'] = 'Dashboard';
        if($this->session->userdata['role']=='admin'){
            $this->data['content_users'] = $this->load->view('users_datatable_view','',true);
        }
        $this->data['content_post'] = $this->load->view('post_datatable_view','',true);
        $this->data['content_reports'] = $this->load->view('reports_datatable_view','',true);


        $this->template->view('dashboard_view',$this->data);

    }


}