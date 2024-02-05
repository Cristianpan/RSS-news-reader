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
                'constraint' => 60,
            ], 
            'url' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ], 
            'description' => [
                'type' => 'text', 
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255,
            ], 
            'date' => [
                'type' => 'date'
            ],
            'websiteId' => [
                'type' => 'int'
            ]
        ]); 

        $this->forge->addKey('id', true); 
        $this->forge->addForeignKey('websiteId', 'websites', 'id', 'CASCADE', 'CASCADE', 'websiteId_new_FK');
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news'); 
    }
}
