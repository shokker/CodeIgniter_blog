<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_xml extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('view_xml_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'typography', 'my_helper'));
        $this->data['report_form'] ='';
        $this->data['db_error'] = '';


    }

    public function index(){

        $this->data['title'] = 'XML';
        $this->data['xmls'] = $this->view_xml_model->get();
        $this->data['xmls_edit'] = $this->view_xml_model->get_edit();
        $this->data['xml_directory'] = 'xml_edit';


        //$this->data['xml'] = simplexml_load_file('assets/test.xml');
        $this->template->view('view_xml_view',$this->data);
    }

    public function edit_xml($file)
    {
        $this->data['title'] = 'EDIT';
            $this->data['source'] = urldecode($file);
            $this->data['xml'] = $this->view_xml_model->xml2array('xml/'.urldecode($file));

            $this->template->view('xml_edit_experiment_view', $this->data);
    }

    public function database()
    {
        $this->view_xml_model->xml_database($_POST);
    }

    public function edit_proceed_xml($xml)
    {


            $filename = $this->view_xml_model->process(urldecode($xml));

            if (isset($_POST['save'])) {
                    $this->view_xml_model->download(urldecode($xml),$filename);

            }
            redirect('view_xml');



    }

    public function delete($filename)
    {
        $this->view_xml_model->delete($filename);
        redirect('view_xml');
    }
    public function upload(){
        $this->data['title'] = 'XML Upload';
        return $this->template->view('xml_upload_view',$this->data);


    }
    public function do_upload(){



            $this->data['title'] = 'XML Upload';
            if($_FILES['file']['tmp_name']) {
                if ($ok=$this->_xmlUpload()) {
                    $xml = $ok[0];
                    $xml_file = $ok[1];
                    $this->view_xml_model->do_upload($xml_file);
                    redirect('/');


                } else {
                    $this->data['upload_error'] = $this->upload->display_errors('<p class = "error_message">', '</p>');
                    return $this->template->view('xml_upload_view',$this->data);
                }
            }

    }
    public function _xmlUpload()
    {
        $id = $this->db->select_max('id')->get('files')->row()->id;

        $config['upload_path'] = './xml/';
        $config['allowed_types'] = 'xml';
        $config['max_size'] = '100';
        $config['overwrite']    = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            return array(array('xml_id'=>$id +1),array('filename'=>$data['file_name'],
                                                       'filezise'=>$data['file_size'],
                                                       'system_path'=>$data['full_path'],
                                                        // plati len pre localhost
                                                       'web_path'=>'/xml/'.$data['file_name'])
                );
            }
        return false;
    }


}