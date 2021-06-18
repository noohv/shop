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


        DB::table('roles')->insert([
            'name' => 'Client',
        ]);

        DB::table('roles')->insert([
            'name' => 'Business',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);


        // Admin
        DB::table('users')->insert([
            'name' => 'vhoon',
            'email' => 'valters.huuns@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 3,
        ]);

        // Business
        DB::table('users')->insert([
            'name' => 'Restaurant1',
            'email' => 'restaurant1@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Restaurant2',
            'email' => 'restaurant2@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Restaurant3',
            'email' => 'restaurant3@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 2,
        ]);

        // Clients
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'vhoon1@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'vhoon2@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'vhoon3@gmail.com',
            'password' => Hash::make('valtersh26'),
            'role' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Pasta',
            'description' => 'Pasta from Italy',
        ]);

        DB::table('categories')->insert([
            'name' => 'Soup',
            'description' => 'Tasty water',
        ]);

        DB::table('categories')->insert([
            'name' => 'Potato',
            'description' => 'Potato!?',
        ]);

        DB::table('categories')->insert([
            'name' => 'Vegeterian',
            'description' => 'No meat',
        ]);

        DB::table('categories')->insert([
            'name' => 'Pizza',
            'description' => 'Pizza',
        ]);

        DB::table('categories')->insert([
            'name' => 'Chicken',
            'description' => 'Chicken',
        ]);

        DB::table('categories')->insert([
            'name' => 'Beef',
            'description' => 'Beef',
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Johns Pizza',
            'description' => 'Italian Pizzeria with delicious pizzas',
            'image' => 'rest1.jpg',
            'location' => 'Riga',
            'user_id' => '2',
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Mamas Kitchen',
            'description' => 'Foods which make you feel like at home',
            'image' => 'rest2.jpg',
            'location' => 'Riga',
            'user_id' => '3',
        ]);

        DB::table('restaurants')->insert([
            'name' => 'Piano',
            'description' => 'One of the best restaurants in the world',
            'image' => 'rest3.jpg',
            'location' => 'Liepaja',
            'user_id' => '4',
        ]);

        DB::table('foods')->insert([
            'name' => 'Mozarella Pizza',
            'description' => 'Pizza with cheese, mostly mozarella',
            'image' => 'pizza1.jpg',
            'price' => '8.99',
            'category_id' => '5',
            'restaurant_id' => '1',
        ]);

        DB::table('foods')->insert([
            'name' => 'Vegeterian Pizza',
            'description' => 'Pizza with no meat',
            'image' => 'pizza2.jpg',
            'price' => '10.99',
            'category_id' => '5',
            'restaurant_id' => '1',
        ]);

        DB::table('foods')->insert([
            'name' => 'Classical Pizza',
            'description' => 'Classical italian pizza',
            'image' => 'pizza3.jpg',
            'price' => '9.55',
            'category_id' => '5',
            'restaurant_id' => '1',
        ]);

        DB::table('foods')->insert([
            'name' => 'Slice of Pizza',
            'description' => 'Slice from big pizza',
            'image' => 'pizza4.jpg',
            'price' => '3.99',
            'category_id' => '5',
            'restaurant_id' => '1',
        ]);

        DB::table('foods')->insert([
            'name' => 'Triple Burger',
            'description' => 'Burger three storeys high',
            'image' => 'burger1.jpg',
            'price' => '7.99',
            'category_id' => '2',
            'restaurant_id' => '2',
        ]);


        DB::table('foods')->insert([
            'name' => 'Big Burger',
            'description' => 'Pretty big burger',
            'image' => 'burger2.jpg',
            'price' => '6.99',
            'category_id' => '2',
            'restaurant_id' => '2',
        ]);


        DB::table('foods')->insert([
            'name' => 'Chicken Medalions',
            'description' => 'Chicken fillet',
            'image' => 'chicken.jpg',
            'price' => '8.25',
            'category_id' => '6',
            'restaurant_id' => '2',
        ]);

        DB::table('foods')->insert([
            'name' => 'Big Fish',
            'description' => 'Whole fish with lemon',
            'image' => 'fish1.jpg',
            'price' => '11.50',
            'category_id' => '3',
            'restaurant_id' => '2',
        ]);


        DB::table('foods')->insert([
            'name' => 'Cream soup',
            'description' => 'Very good cream soup',
            'image' => 'soup1.jpg',
            'price' => '13.50',
            'category_id' => '2',
            'restaurant_id' => '2',
        ]);
    }
}
