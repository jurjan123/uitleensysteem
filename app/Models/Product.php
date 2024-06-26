<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "image",
        "barcode_number",
        "warranty",
        "max_lease",
        "category_id"

    ];

    public function categories(){
        return $this->belongsTo(Category::class, "category_id");
    }
}
