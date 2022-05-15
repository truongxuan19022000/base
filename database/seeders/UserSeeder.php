<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertGetId([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);

        DB::table('users')->insertGetId([
            'name' => "vendor",
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);

        DB::table('users')->insertGetId([
            'name' => "guest",
            'email' => 'guest@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 3,
        ]);
    }
}
