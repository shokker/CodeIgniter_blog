<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setup_model');
        $this->load->helper('url');
        $this->data['report_form'] = '';


    }

    public function index(){

        $this->data['title'] = 'Setup';

      if($this->setup_model->createDbPostTable() && $this->setup_model->createReportsTable()
          && $this->setup_model->createUsersTable()  && $this->setup_model->createFilesTable()&& $this->setup_model->createFilesXMLTable()
      && $this->setup_model->createCdtTrfTxInfTable()&& $this->setup_model->createFilesXmlEditTable()){
          $this->data['message'] = "tables loaded!";
          $this->template->view('setup_view', $this->data);
        }else {
          $this->data['message'] = "whoops something went wrong";
          $this->template->view('setup_view',  $this->data);
      }

    }




}