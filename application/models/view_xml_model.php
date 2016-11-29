<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_xml_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('my_helper');
        $this->output = [];
        $this->key_array = [];
        $this->all_keys = [];


    }

    public function do_upload($file){

            $query_file = $this->db->insert('filesXML',$file);
            return $query_file;


    }
    public function get(){

        $sql = $this->db->get('filesXML');
        return $sql->result();    
    }


        function xml2array($fname){
            $sxi = new SimpleXmlIterator($fname, null, true);
            return $this->sxiToArray($sxi);
        }
        function sxiToArray($sxi){



            for( $sxi->rewind(); $sxi->valid(); $sxi->next() ) {
                if($sxi->hasChildren()){
                    array_push($this->key_array,$sxi->key());
                    if(array_key_exists(implode('_',$this->key_array),$this->all_keys)){
                        $this->all_keys[implode('_',$this->key_array)] ++;
                    }
                    else{
                        $this->all_keys[implode('_',$this->key_array)]=0;
                    }
                    $this->key_array[count($this->key_array)-1] .= ':'.$this->all_keys[implode('_',$this->key_array)];

                    array_push($this->output,form_fieldset($sxi->key(),array('class'=>"inner_label")));


                    $this->sxiToArray($sxi->current());

                    array_push($this->output,form_fieldset_close());
                    array_pop($this->key_array);

                }
                else{
                    array_push($this->key_array,$sxi->key());
                    if(array_key_exists(implode('_',$this->key_array),$this->all_keys)){
                        $this->all_keys[implode('_',$this->key_array)] ++;
                    }
                    else{
                        $this->all_keys[implode('_',$this->key_array)]=0;
                    }


                    array_push($this->output,form_label($sxi->key().':',implode('_',$this->key_array).':'.$this->all_keys[implode('_',$this->key_array)]));
                    array_push($this->output,form_input(implode('_',$this->key_array).':'.$this->all_keys[implode('_',$this->key_array)],set_value(implode('_',$this->key_array).':'.$this->all_keys[implode('_',$this->key_array)],strval($sxi->current())),'placeholder='.$sxi->key().' class="form-control header_form" id='.implode('_',$this->key_array).':'.$this->all_keys[implode('_',$this->key_array)]));
                    array_pop($this->key_array);
                }
            }
            return $this->output;
    }

    public function delete($filename)
    {
        unlink('./xml/'.$filename);
        $this->db->where('filename', $filename);
        $this->db->delete('filesXML');
    }



}