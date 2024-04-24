<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            ['name' => 'Yahya',
                'mail' => 'yahya@yahya.com',
                'password' => Hash::make('yahya'),
                'unit_id' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
            ], ['name' => 'Ahmet',
                'mail' => 'ahmet@ahmet.com',
                'password' => Hash::make('ahmet'),
                'unit_id' => 2,
                'active' => 1,
                'created_at' => Carbon::now(),
            ], ['name' => 'Mustafa',
                'mail' => 'mustafa@mustafa.com',
                'password' => Hash::make('mustafa'),
                'unit_id' => 3,
                'active' => 1,
                'created_at' => Carbon::now(),
            ], ['name' => 'Emin',
                'mail' =>  'emin@emin.com',
                'password' => Hash::make('emin'),
                'unit_id' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
