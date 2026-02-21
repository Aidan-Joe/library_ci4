<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'title' => 'Cloud Computing di Dunia Pendidikan',
                'content' => 'Cloud Computing membantu efisiensi sistem pembelajaran.',
                'category_id' => 2,
            ],
            [
                'title' => 'Perkembangan AI Tahun 2026',
                'content' => 'Artificial Intelligence semakin luas digunakan.',
                'category_id' => 1,
            ],
        ];

        $this->db->table('articles')->insertBatch($data);
    }
}
