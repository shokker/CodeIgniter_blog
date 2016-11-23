<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_xml extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'typography', 'my_helper'));
        $this->data['report_form'] ='';
        $this->data['db_error'] = '';


    }

    public function index(){

        $this->data['title'] = 'XML';
        $this->data['xml'] = simplexml_load_file('assets/test.xml');
        $this->template->view('view_xml_view',$this->data);
    }

    public function edit_xml($id)
    {
        $this->form_validation->set_rules('todo', 'Todo', 'required|')
            ->set_rules('body', 'Body', 'required|')
            ->set_rules('from', 'From', 'required|');
        if($this->form_validation->run()){
            $xml =  simplexml_load_file('assets/test.xml');
            $xml->note[intval($id)]->todo = $this->input->post('todo');
            $xml->note[intval($id)]->body = $this->input->post('body');
            $xml->note[intval($id)]->from = $this->input->post('from');

            $xml->asXML('assets/test.xml');
            redirect('view_xml');
        }
        else {
            $this->data['title'] = 'EDIT';
            $this->data['xml'] = simplexml_load_file('assets/test.xml');
            $this->data['id'] = $id;
            $this->template->view('xml_edit_view', $this->data);
        }
    }
    public function upload(){
        $this->data['title'] = 'XML Upload';
        return $this->template->view('xml_upload_view',$this->data);


    }
    public function do_upload(){



            $this->data['title'] = 'XML Upload';
            if($_FILES['file']['tmp_name']) {
                if ($ok=$this->_avatarUpload()) {
                    $xml = $ok[0];
                    $xml_file = $ok[1];


                } else {
                    $this->data['upload_error'] = $this->upload->display_errors('<p class = "error_message">', '</p>');
                    return $this->template->view('xml_upload_view',$this->data);
                }
            }
    }
    public function _avatarUpload()
    {
        $id = $this->db->select_max('id')->get('files')->row()->id;

        $config['upload_path'] = './xml/';
        $config['allowed_types'] = 'xml';
        $config['max_size'] = '100';
        $config['overwrite']    = TRUE;
        $config['file_name'] = $id +1;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            return array(array('xml_id'=>$id +1),array('filename'=>$data['file_name'],
                                                       'filezise'=>$data['file_size'],
                                                       'system_path'=>$data['full_path'],
                                                        // plati len pre localhost
                                                       'web_path'=>'/Codeigniter/images/'.$data['file_name'])
                );
            }
        return false;
    }


}