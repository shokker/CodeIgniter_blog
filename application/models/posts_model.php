<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model {


    public function getAll()
    {
        $query = $this->db->order_by('date','desc')->get('posts');
        return $query->result();
    }

    public function createPost()
    {
        $data = array(
            'title'=>$this->input->post('title'),
            'text'=>$this->input->post('text')
        );
        $query = $this->db->insert('posts',$data);
        return $query;
    }


}