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
        'category_id',
        'country_code_id',
        'currency_id',
    ];
    protected $casts = [
        'id'            => 'integer',
        'image'         => 'string', 
        'product_code'  => 'string',
        'name'          => 'string', 
        'slug'          => 'string', 
        'merchant_id'   => 'integer', 
        'price'         => 'integer',   
        'status'        => 'string', 
        'size'          => 'integer', 
        'description'   => 'string', 
        'category_id'   => 'integer',
        'country_code_id' => 'integer',
        'currency_id'   => 'integer',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(CountryCode::class, 'country_code_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public function addToCart(){
        return $this->hasMany(AddToCart::class);
    }
}
