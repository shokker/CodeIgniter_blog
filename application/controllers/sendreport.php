<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendreport extends CI_Controller {


    public function createReport(){
        $this->load->library('form_validation');
        $this->load->model('report_model');
        $this->load->helper('url');

        $this->form_validation->set_rules('title','Title','required')
            ->set_rules('email','Email','required|valid_email')
            ->set_rules('text','text','required');
        $this->form_validation->set_error_delimiters('<p class = "error_message">','</p>');

        if($this->form_validation->run()){
            if($this->report_model->createReport()){


                $this->session->set_flashdata('report_message','Report send');
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from('lukas.danko1@gmail.com', "Lukáš Danko");
                $this->email->to($this->input->post('email'));
                $this->email->subject($this->input->post('title'));
                $this->email->message($this->input->post('text'));

                if ( ! $this->email->send())
                {
                    $this->session->set_flashdata('report_message','Mail not send ');

                }
                redirect('posts');

            }else{
                $this->session->set_flashdata('report_message','whoops something went wrong :(');

                redirect('posts');
            }

        }else{
            $this->session->set_flashdata('error',validation_errors());
            redirect('posts');
        }








    }



}