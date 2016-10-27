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

//        vybereme webpath z files a pripojime ho k userovi
//    ale co ak avatar je null ??
//

        $query = $this->db->query("SELECT 
                                  users.id,users.email,users.role,files.web_path
                                  FROM files 
                                  RIGHT JOIN users 
                                  ON users.avatar  = files.id
                                  WHERE users.email ='$email'");






//        $this->db->from('files');
//        $this->db->join('users', 'avatar = files.id');
//        $query = $this->db->select('users.email,users.id,files.web_path,users.role')
//                          ->where('email',$email)
//                          ->get();
        if($query->num_rows == 1){
            return $query->row_array();
        }
        return false;

    }

    public function register($avatar,$file_avatar)
    {
        $data = array(
            'email'=> $this->input->post('email'),
            'password'=> sha1($this->input->post('password')),
            'role'=>'user'
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
                      'role'=>'',
                      'web_path'=>'');
        $this->session->unset_userdata($data);
    }


}