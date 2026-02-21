<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'year' => [
                'type' => 'INT',
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

        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}