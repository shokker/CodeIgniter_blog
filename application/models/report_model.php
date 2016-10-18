<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function createReport(){

        $data = array(
            'title'=>$this->input->post('title'),
            'text'=>$this->input->post('text'),
            'author'=>$this->input->post('email'),

        );
        $query = $this->db->insert('reports',$data);
        return $query;

    }
    public function getAll()
    {
        $query = $this->db->order_by('date','desc')->get('reports');
        return $query->result();
    }


}