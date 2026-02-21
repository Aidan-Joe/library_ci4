<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Sherlock Holmes',
                'author' => 'AidAn Joe',
                'year' => 2025,
                'category_id' => 1,
            ]
        ];

        $this->db->table('books')->insertBatch($data);
    }
}