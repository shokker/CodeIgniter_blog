<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatable extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('EditorLib');
        $this->load->helper(array('url','my_helper'));
        $this->data['report_form'] = '';
    }

    public function index(){
        $this->data['title'] = 'Datatables';
        $this->template->view('datatables_view',$this->data);


        

    }


}