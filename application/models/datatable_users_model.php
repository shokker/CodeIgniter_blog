<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

class Datatable_users_model extends CI_Model {

    private $editorDb = null;

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    public function getTable($post)
    {

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        $this->load->helper(array('my_helper','url'));

        //`Call the process method to process the posted data


            Editor::inst( $this->editorDb, 'users' )
            ->fields(
                Field::inst( 'id' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'email' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'password' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'avatar' )
                    ->setFormatter( 'Format::ifEmpty', null )
                    // cesta CodeIgniter len koli localhoste
                    ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/CodeIgniter/images/__ID__.__EXTN__' )
                        ->db( 'files', 'id', array(
                            'filename'    => Upload::DB_FILE_NAME,
                            'filezise'    => Upload::DB_FILE_SIZE,
                            'web_path'    => Upload::DB_WEB_PATH,
                            'system_path' => Upload::DB_SYSTEM_PATH
                        ) )
                        ->validator( function ( $file ) {
                            return$file['size'] >= 500000 ?
                                "Files must be smaller than 500K" :
                                null;
                        } )
                        ->allowedExtensions( [ 'png', 'jpg', 'gif' ], "Please upload an image" )
                    ),
                Field::inst( 'role' )
            )
                ->on('preCreate',function ($editor,$values){
                    $editor
                        ->field( 'password' )
                        ->setValue( sha1($values['password']) );

                })
                ->on( 'preEdit', function ( $editor,$id,$values) {
                    $editor
                        ->field( 'password' )
                        ->setValue( sha1($values['password']) );
                })

            ->process( $post )
            ->json();
    }


}