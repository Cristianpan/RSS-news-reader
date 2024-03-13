<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Websites extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int', 
                'auto_increment' => true
            ], 
            'name' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ], 
            'url' => [
                'type' => 'varchar', 
                'constraint' => 255
            ], 
            'icon' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ]
        ]); 

        $this->forge->addKey('id', true); 
        $this->forge->createTable('websites', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('websites');
    }
}
