<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'vhoon',
            'email' => 'valters.huuns@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'vhoon2',
            'email' => 'vhoon2@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'vhoon3',
            'email' => 'vhoon3@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 0,
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Babilonija',
            'description' => 'Best restsr',
            'user_id' => 1,
            'status' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Pasta',
            'description' => 'Makaron',
        ]);

        DB::table('categories')->insert([
            'name' => 'Soup',
            'description' => 'Tasty water',
        ]);

        DB::table('categories')->insert([
            'name' => 'Potato',
            'description' => 'Potato!?',
        ]);
    }
}
