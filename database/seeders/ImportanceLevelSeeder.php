<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportanceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('importance_levels')->insert([
            ['title' => 'Kritik'],
            ['title' => 'Çok Önemli'],
            ['title' => 'Normal'],
        ]);
    }
}
