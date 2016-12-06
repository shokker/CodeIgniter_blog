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
                'constraint'=>'100',
                'unique' => TRUE,
            ),
            'password'=>array(
                'type'=>'VARCHAR',
                'constraint'=>100
            ),
            'avatar'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>TRUE

            ),
            'role'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255

            )
        );
        return createTable($fields_users,'id','users');


    }

    public function createFilesTable()
    {

        $fields_files = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'filename'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'filezise'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'web_path'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'system_path'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),

        );
        return createTable($fields_files,'id','files');


    }
     public function createFilesXmlTable()
    {

        $fields_files = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'filename'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'filezise'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'web_path'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'system_path'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),

        );
        return createTable($fields_files,'id','filesXML');
    }

    public function createFilesXmlEditTable()
    {

        $fields_files = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'filename'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'server_name'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'
            )

        );
        return createTable($fields_files,'id','FilesXmlEdit');

    }
    public function createCdtTrfTxInfTable()
    {

        $fields_CdtTrfTxInf = array(
            'id'=>array(
                'type'=>'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'EndToEndId'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'InstdAmt'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'BIC'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'Nm'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'BICOrBEI'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'IBAN'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),
            'Ustrd'=>array(
                'type' => 'VARCHAR',
                'constraint'=>'255'

            ),

        );
        return createTable($fields_CdtTrfTxInf,'id','CdtTrfTxInf');


    }



}