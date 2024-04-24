<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            ['title' => "Mobil Yönetim Paneli Hatası",
                'status_id' => 1,
                'user_id' => 2,
                'importance_level_id' => 1,
                'unit_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['title' => "Web Sitesinde 403 Hatası Alıyourm",
                'status_id' => 1,
                'user_id' => 3,
                'importance_level_id' => 2,
                'unit_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['title' => "Giriş Yaparken Hata Aldım \"HTTP 500\" ",
                'status_id' => 1,
                'user_id' => 1,
                'importance_level_id' => 3,
                'unit_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['title' => "DNS Ayarlarının Sağlanması",
                'status_id' => 1,
                'user_id' => 1,
                'importance_level_id' => 2,
                'unit_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],

        ]);
    }
}
