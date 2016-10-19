<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(! function_exists('createTable')){

    function createTable($fields,$primary_key,$table_name)
    {
        $CI =& get_instance();
        $CI->dbforge->add_field($fields);
        $CI->dbforge->add_key($primary_key);
        return $CI->dbforge->create_table($table_name,TRUE);
    }
    function word_limiter($text,$limit){

        $string_array = explode(' ',$text,$limit);
        if (count($string_array)== $limit){
            $string_array[$limit-1] = '...';
        }
        return implode(' ',$string_array);

    }
    function create_slug($title,$id =0 ){
        $array = explode(' ',strtolower($title));
        return implode('-',$array) . "-" . ($id+1);
    }
}