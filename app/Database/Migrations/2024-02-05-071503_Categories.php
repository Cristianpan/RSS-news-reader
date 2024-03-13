<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
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
                'constraint' => 150,
            ], 
            'newId' => [
                'type' => 'int'
            ]
        ]);

        $this->forge->addKey('id', true); 
        $this->forge->addForeignKey('newId', 'news', 'id', 'CASCADE', 'CASCADE', 'newId_category_FK');
        $this->forge->createTable('categories', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('categories');
        
    }
}
