<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_xml_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('my_helper');
    }

    public function do_upload($file){

            $query_file = $this->db->insert('filesXML',$file);
            return $query_file;


    }
    public function get(){

        $sql = $this->db->get('filesXML');
        return $sql->result();    
    }



}