<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'image',
        'product_code',
        'name', 
        'slug', 
        'merchant_id', 
        'price',   
        'status', 
        'size', 
        'description', 
        'category_id'
    ];
    protected $casts = [
        'image'         => 'string', 
        'product_code'  => 'string',
        'name'          => 'string', 
        'slug'          => 'string', 
        'merchant_id'   => 'integer', 
        'price'         => 'decimal',   
        'status'        => 'integer', 
        'size'          => 'string', 
        'description'   => 'string', 
        'category_id'   => 'integer'
    ];
}
