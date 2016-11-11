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


}