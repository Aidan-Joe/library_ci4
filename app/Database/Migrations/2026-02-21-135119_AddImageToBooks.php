<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToBooks extends Migration
{
    public function up()
    {
        $this->forge->addColumn('books', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'year'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('books', 'image');
    }
}