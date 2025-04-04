<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'image',
        'category_name',
        'category_slug',
        'status',
        'description'
    ];
    protected $casts = [
        'id'            => 'integer',
        'image'         => 'string',
        'category_name' => 'string',
        'category_slug' => 'string',
        'status'        => 'integer',
        'description'   => 'string'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
