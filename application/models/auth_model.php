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

    public function getUser($email)
    {

        //toto treba nejak vyriesit
        $this->db->select('web_path');
        $this->db->from('files');
        $this->db->join('users', 'avatar = files.id');
        $query = $this->db->select('users.email,users.id,files.web_path')
                          ->where('email',$email)
                          ->get();
        if($query->num_rows == 1){
            return $query->row_array();
        }
        return false;

    }

    public function register($avatar,$file_avatar)
    {
        $data = array(
            'email'=> $this->input->post('email'),
            'password'=> sha1($this->input->post('password'))
        );
        $data += $avatar;
        $query = $this->db->insert('users',$data);

        $file_data = $file_avatar;
        $query_file = $this->db->insert('files',$file_data);
        return $query && $query_file;
    }

    public function logout()
    {
        $data = array('email'=>'',
                      'logged_in'=>'',
                      'web_path'=>'');
        $this->session->unset_userdata($data);
    }


}