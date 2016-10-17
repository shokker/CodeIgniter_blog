<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(! function_exists('form_email')){
    function form_email($data = '',$value='',$extra=''){

        if(! is_array($data)){

            $data = array(
                'name'=> $data
            );

        }
        $data['type'] = 'email';
        return form_input($data,$value,$extra);
    }


}
