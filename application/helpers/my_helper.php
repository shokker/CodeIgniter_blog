<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(! function_exists('createTable')){

    function createTable($fields,$primary_key,$table_name)
    {
        $CI =& get_instance();
        $CI->dbforge->add_field($fields);
        $CI->dbforge->add_key($primary_key);
        return $CI->dbforge->create_table($table_name,TRUE);
    }
}