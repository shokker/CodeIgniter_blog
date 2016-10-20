<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

class Datatable_model extends CI_Model {

    private $editorDb = null;

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    public function getTable($post)
    {

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        $this->load->helper('my_helper');

        //`Call the process method to process the posted data


            Editor::inst( $this->editorDb, 'posts' )
            ->fields(
                Field::inst( 'id' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'title' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'text' ),
                Field::inst( 'date' )
                    ->validator( 'Validate::dateFormat', array(
                        "format"  => Format::DATE_ISO_8601,
                        "message" => "Please enter a date in the format yyyy-mm-dd"
                    ) )
                    ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
                    ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
                Field::inst( 'slug' )->set( Field::SET_CREATE )->set( Field::SET_EDIT )
            )->on('preCreate',function ($editor,$values){
                    $id = $this->db->select_max('id')->get('posts')->row()->id;
                    $editor
                        ->field( 'slug' )
                        ->setValue( create_slug($values['title'],$id) );

                })
                ->on( 'preEdit', function ( $editor,$id,$values) {
                    $editor
                    ->field( 'slug' )
                        ->setValue( create_slug($values['title'],$id) );
                })
            ->process( $post )
            ->json();
    }


}