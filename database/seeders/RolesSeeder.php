<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'name' => 'admin',
        ]);
    
        DB::table('user_roles')->insert([
            'name' => 'teacher',
        ]);
        DB::table('user_roles')->insert([
            'name' => 'student',
        ]);
    }
}
