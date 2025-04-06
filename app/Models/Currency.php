<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = 'currencies';
    protected $fillable = [
        'name',
        'code',
        'symbol',
        'exchange_rate'
    ];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'symbol' => 'string',
        'exchange_rate' => 'double',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'currency_id', 'id');
    }
}
