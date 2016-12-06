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
    public function get_edit(){

        $sql = $this->db->get('FilesXmlEdit');
        return $sql->result();
    }


        public function xml2array($fname){
            $sxi = new SimpleXmlIterator($fname, null, true);
            return $this->sxiToArray($sxi);
        }
        public function sxiToArray($sxi){



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

    public function process($xml)
    {

        $xml_file =  simplexml_load_file('xml/'.$xml);
        $var='';
        $count = count($_POST);
        foreach ($_POST as $key=>$value){
            if(--$count<=0){
                break;
            }

            if($key == 'filename' || $key=='submit'){
                continue;
            }
                $temp_array = explode('_', $key);
                for ($i = 0; $i < count($temp_array); $i++) {
                    $temp_array[$i] = explode(':', $temp_array[$i]);
                    $id = intval(array_pop($temp_array[$i]));
                    $temp_string = $temp_array[$i][0];

                    if ($i == 0) {
                        $var = $xml_file->{$temp_string}[$id];
                    } elseif ($i == count($temp_array) - 1) {
                        $var->{$temp_string} = $value;
                    } else {
                        $var = $var->{$temp_string}[$id];
                    }
            }

        }
        //$xml povodny nazov filu

        $xmlfile = time().'.xml';
        $xml_file->asXML('xml_edit/test-'.$xmlfile);
        $array = array('filename'=>$xml,'server_name'=>$xmlfile);
        $this->db->insert('FilesXmlEdit',$array);
        return $xmlfile;
    }

    public function download($xml,$filename)
    {

        header('Content-type: text/xml; charset=utf-8');
        if($_POST['filename']!= ''){
            header('Content-Disposition: attachment; filename='.$_POST['filename'].'.xml');
        }
        else {
            // furt to iste $xml ako hore
            // tu v pohode nazov aj s diakritikou
            header('Content-Disposition: attachment; filename='.$xml);
        }

//output the XML data
        /// a tu uz nie !!!!!!!!!
        readfile($_SERVER['DOCUMENT_ROOT'].'/xml_edit/test-'.$filename);
        //return $xml_file->asXML('xml_edit/test-'.$xml);
        // if you want to directly download then set expires time
        header("Expires: 0");
        die();

    }

    public function xml_database($post)
    {
        $default = 0;
        $db_array = [];
        foreach ($post as $key=>$value){
            if($key == 'filename' || $key=='submit'){
                continue;
            }
            if(strpos($key, 'CdtTrfTxInf')){
                $temp_array = explode('_',$key);
                $temp_key = explode(':',$temp_array[2]);
                $temp_key =intval(array_pop($temp_key));
                $last_key = array_pop($temp_array);
                $last_key = explode(':',$last_key);
                var_dump($temp_key.', '. $last_key[0]);
                if($default == $temp_key){
                    $db_array[$last_key[0]] = $value;
                }
                else {
                    $default = $temp_key;
                    $this->db->insert('CdtTrfTxInf', $db_array);
                    $db_array = [];
                    $db_array[$last_key[0]] = $value;
                }
            }
            print_r('<br>');
        }
        print_r($db_array);
        $this->db->insert('CdtTrfTxInf', $db_array);
    }


}