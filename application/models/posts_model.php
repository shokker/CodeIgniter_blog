<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model {

    public function __construct(){

        parent::__construct();


    }

    public function getAll()
    {
        $query = $this->db->order_by('date','desc')->get('posts');
        return $query->result();
    }


}