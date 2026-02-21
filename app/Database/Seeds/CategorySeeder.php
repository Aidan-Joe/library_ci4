<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        //
         $data = [
            ['name' => 'Teknologi'],
            ['name' => 'Pendidikan'],
            ['name' => 'Olahraga'],
            ['name' => 'Sains'],
            ['name' => 'Sosial'],
            ['name' => 'Psikologi'],
            ['name' => 'Fiksi'],
            ['name' => 'Non-Fiksi'],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
