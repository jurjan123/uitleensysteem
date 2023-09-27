<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $ldate = date('Y-m-d H:i:s');
        
        DB::table("products")->insert([
            [
            "title" => "voetbal",
            "description" => "mooie voetbal",
            "max_lease" => $ldate,
            "warranty" => "15.00",
            "barcode_number" => "hoi"
            ],
            [
                "title" => "tafeltennisbatje",
                "description" => "mooi rubber voor effect",
                "max_lease" => $ldate,
                "warranty" => "20.00",
                "barcode_number" => "hoi"
            ],
            [
                "title" => "hockeystick",
                "description" => "hard",
                "max_lease" => $ldate,
                "warranty" => "30.00",
                "barcode_number" => "hoi"
            ],
            [
                "title" => "honkbalknuppel",
                "description" => "hard",
                "max_lease" => $ldate,
                "warranty" => "30.00",
                "barcode_number" => "hoi"
            ],
            [
                "title" => "basketbal",
                "description" => "hard",
                "max_lease" => $ldate,
                "warranty" => "30.00",
                "barcode_number" => "hoi"
            ],

            
            
        ]
        
             );
    }
}
