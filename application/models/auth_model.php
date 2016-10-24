<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function login(){

        $this->db->where('email',$this->input->post('email'));
        $this->db->where('password',sha1($this->input->post('password')));
        $query =$this->db->get('users');
        
        if($query->num_rows == 1){
            return true;
        }
        return false;
    }

    public function register()
    {
        $data = array(
            'email'=> $this->input->post('email'),
            'password'=> sha1($this->input->post('password'))
        );
        $query = $this->db->insert('users',$data);
        return $query;
    }


}