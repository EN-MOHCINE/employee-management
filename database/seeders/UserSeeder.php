<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a Faker instance
        $faker = Faker::create();

        // Number of users to create
        $numberOfUsers = 10;

        // Array to hold user data
        $users = [];

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123'),
            ];
        }

        // Insert the user data into the users table
        DB::table('users')->insert($users);
    }
}
