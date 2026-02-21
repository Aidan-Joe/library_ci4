<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticles extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'category_id' => [
                'type' => 'INT',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey(
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('articles');
    
    }

    public function down()
    {
        //
        $this->forge->dropTable('articles');
    }
}
