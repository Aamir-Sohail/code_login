<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Register extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' =>  'INT', 'constraint' =>11 ,'auto_increment'=> true, 'unsinged'=>true,], 
            'name'       => ['type' => 'varchar', 'constraint' => 31],     
            'username'      => ['type' => 'varchar', 'constraint' => 63],
            'email'   => ['type' => 'varchar', 'constraint' => 255],
            'password'   => ['type' => 'varchar', 'constraint' => 255],
            'address'   => ['type' => 'varchar', 'constraint' => 255],
            'number'   => ['type' => 'INT', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'NULL' => false],
        
        ]);
        $this->forge->addPrimaryKey('id',true);
      
        $this->forge->createTable('register',true);
    }

    public function down()
    {
        $this->forge->dropTable('register');

    }
}
