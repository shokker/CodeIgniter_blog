<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorLib {

    private $CI = null;

    function __construct()
    {
        $this->CI = &get_instance();
    }

    public function process($post,$model)
    {
        // DataTables PHP library
        require dirname(__FILE__).'/Editor-PHP-1.5.6/php/DataTables.php';

        //Load the model which will give us our data
        $this->CI->load->model($model,'model');

        //Pass the database object to the model
        $this->CI->model->init($db);

        //Let the model produce the data
        $this->CI->model->getTable($post);
    }
}