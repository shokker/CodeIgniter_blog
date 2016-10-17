<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->dbforge();
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
            )
        );
        return $this->createTable($fields_posts,'id','posts');

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
        return $this->createTable($fields_reports,'id','reports');


    }
    public function createTable($fields,$primary_key,$table_name)
    {
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key($primary_key);
        return $this->dbforge->create_table($table_name,TRUE);
    }


}