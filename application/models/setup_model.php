<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->dbforge();
        $this->load->helper('my_helper');
    }

    public function createDbPostTable()
    {
        $fields_posts = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'text' => array(
                'type' => 'TEXT'
            ),
            'date' => array(
                'type' => 'TIMESTAMP'
            ),
            'slug' => array(
                'type'=>'VARCHAR',
                'constraint'=>100
            )
        );
        return createTable($fields_posts,'id','posts');

    }

    public function createReportsTable()
    {

        $fields_reports = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'
            ),
            'text'=>array(
                'type'=>'TEXT'
            ),
            'author'=>array(
                'type'=>'VARCHAR',
                'constraint'=>100
            ),
            'date'=>array(
                'type'=>'TIMESTAMP'
            )
        );
        return createTable($fields_reports,'id','reports');


    }
    public function createUsersTable()
    {

        $fields_users = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'email'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'100'
            ),
            'password'=>array(
                'type'=>'VARCHAR',
                'constraint'=>100
            )
        );
        return createTable($fields_users,'id','users');


    }



}