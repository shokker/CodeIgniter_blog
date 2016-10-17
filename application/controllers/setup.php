<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setup_model');
    }

    public function index(){

      if($this->setup_model->createDbPostTable() && $this->setup_model->createReportsTable()){
          $data['message'] = "tables loaded!";
          $this->template->view('setup_view',$data);
        }else {
          $data['message'] = "whoops something went wrong";
          $this->template->view('setup_view', $data);
      }

        

    }


}