<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {


    public function posts()
    {
        //Load our library EditorLib
        $this->load->library('EditorLib');


        $this->editorlib->process($_POST,'datatable_model');
    }


}