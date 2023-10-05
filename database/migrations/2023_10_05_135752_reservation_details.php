<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignid("reservation_id")->references("id")->on("reservations")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignid("product_id")->references("id")->on("products")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string("product_name");
            $table->decimal("product_warranty");
            $table->string("product_image");
            $table->integer("quantity");
            $table->decimal("total_warranty");
            $table->timestamps();
        });
        
        
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
