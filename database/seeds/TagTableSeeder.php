<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'si-fi',
            'status' => 'active',
            'display_name' => 'Si-Fi',
        ]);
        DB::table('tags')->insert([
            'name' => 'codegeek',
            'status' => 'active',
            'display_name' => 'CodeGeek',
        ]);
        DB::table('tags')->insert([
            'name' => 'foodies',
            'status' => 'inactive',
            'display_name' => 'Foodies',
        ]);
        DB::table('tags')->insert([
            'name' => 'traveler',
            'status' => 'inactive',
            'display_name' => 'Traveler',
        ]);
    }
}
