<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            [
                "title" => "Tafeltennis",
                "description" => "tennis maar op een tafel",
            ],
            [
                "title" => "honkbal",
                "description" => "bal met stok slaan",
            ],
            [
                "title" => "voetbal",
                "description" => "schoppen tegen een bal",
            ],
            [
                "title" => "consoles",
                "description" => "lekker gamen",
            ],
            [
                "title" => "televisies",
                "description" => "turen naar een groot beeldscherm",
            ]
            ]);
    }
}
