<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'old_price',
        'new_price',
        'subcategory_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    // }
}