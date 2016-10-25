<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('EditorLib');
    }


    public function posts()
    {
        $this->editorlib->process($_POST,'datatable_model');
    }
    public function reports()
    {
        $this->editorlib->process($_POST,'datatable_reports_model');
    }

    public function users()
    {
        $this->editorlib->process($_POST,'datatable_users_model');
    }


}