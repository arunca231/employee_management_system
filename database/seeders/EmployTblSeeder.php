<?php

namespace Database\Seeders;

use App\Models\Employ_tbl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employ_tbl::factory()->count(50)->create();
    }
}
