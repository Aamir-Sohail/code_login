<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' =>  'INT', 'constraint' =>11 ,'auto_increment'=> true, 'unsinged'=>true,], 
            'address'       => ['type' => 'varchar', 'constraint' => 31],     
            'country'      => ['type' => 'varchar', 'constraint' => 63],
            'city'   => ['type' => 'varchar', 'constraint' => 255],
            'postel_code'   => ['type' => 'INT', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'NULL' => false],
        
        ]);
        $this->forge->addPrimaryKey('id',true);
      
        $this->forge->createTable('address',true);
    }

    public function down()
    {
        $this->forge->dropTable('address');

    }
}
