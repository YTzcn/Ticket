<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("units")->insert([
            ['name' => 'Web',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            ['name' => 'Mobil',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['name' => 'Siber Güvenlik',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
        ]);
    }
}
