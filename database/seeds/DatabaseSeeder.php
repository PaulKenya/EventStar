<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_statuses')->insert([
            'status_name' => ('Sold Out'),
            'status_code' => ('0'),
            'status_color' => ('red'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('event_statuses')->insert([
            'status_name' => ('Cancelled'),
            'status_code' => ('1'),
            'status_color' => ('red'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('event_statuses')->insert([
            'status_name' => ('Ongoing'),
            'status_code' => ('2'),
            'status_color' => ('green'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('event_statuses')->insert([
            'status_name' => ('Out of Date'),
            'status_code' => ('3'),
            'status_color' => ('red'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('user_types')->insert([
            'user_type_name' => ('Admin'),
            'user_type_code' => ('0'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('user_types')->insert([
            'user_type_name' => ('Student'),
            'user_type_code' => ('1'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
