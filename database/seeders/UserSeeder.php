<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ldate = date('Y-m-d H:i:s');
       //User::truncate();

        DB::table("users")->insert([
            [
                "first_name" => "Admin",
                "last_name" => "Admin",
                "email" => "Admin@gmail.com",
                "password" => Hash::make("Welkom123"),
                "user_image" => "preset.png",
                "phone_number" => "15660810",
                "role" => "admin",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                
                
            ],
            [
                "first_name" => "user",
                "last_name" => "user",
                "email" => "user@gmail.com",
                "password" => Hash::make("Welkom123"),
                "phone_number" => "15660810",
                "user_image" => "preset.png",
                "role" => "student",
                "created_at" => $ldate,
                "updated_at" => $ldate,
                
                
            ]
            ]);
    }
}
