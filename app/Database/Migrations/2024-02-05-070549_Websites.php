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
                'null' => false,
            ], 
            'url' => [
                'type' => 'varchar', 
                'constraint' => 255,
                'null' => false,
            ], 
            'icon' => [
                'type' => 'varchar', 
                'constraint' => 255,
                'null' => false,
            ],
            'updatedAt' => [
                'type' => 'datetime',
                'null' => false,
            ]
        ]); 

        $this->forge->addKey('id', true); 
        $this->forge->addKey('name');
        $this->forge->addKey('url');
        $this->forge->addKey('icon');
        $this->forge->addKey('updatedAt');
        $this->forge->createTable('websites', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('websites');
    }
}
