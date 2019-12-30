<?php

namespace App\Database\Seeds;

class CoreSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('NewsSeeder');
    }
}
