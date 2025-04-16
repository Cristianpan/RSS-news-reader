<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int', 
                'auto_increment' => true
            ], 
            'title' => [
                'type' => 'varchar', 
                'constraint' => 255,
                'null' => false,
            ], 
            'url' => [
                'type' => 'varchar', 
                'constraint' => 255,
                'null' => false,
            ], 
            'description' => [
                'type' => 'text', 
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ], 
            'date' => [
                'type' => 'date', 
                'null' => false, 
            ],
            'websiteId' => [
                'type' => 'int'
            ]
        ]); 

        $this->forge->addKey('id', true); 
        $this->forge->addKey('title');
        $this->forge->addKey('url');
        $this->forge->addKey('image');
        $this->forge->addKey('date');
        $this->forge->addForeignKey('websiteId', 'websites', 'id', 'CASCADE', 'CASCADE', 'websiteId_new_FK');
        $this->forge->createTable('news', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('news'); 
    }
}
