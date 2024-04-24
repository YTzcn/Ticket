<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([UnitSeeder::class]);
        $this->call([StatusSeeder::class]);
        $this->call([ImportanceLevelSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([TicketSeeder::class]);
        $this->call([MessageSeeder::class]);


    }
}
