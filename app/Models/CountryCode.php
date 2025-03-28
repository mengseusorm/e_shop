<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;
    
    protected $table = 'countrie_codes';
    protected $fillable = ['country_name','country_code','zip'];
    protected $casts = [
        'id'           => 'integer',
        'country_name' => 'string',
        'country_code' => 'string',
        'zip'          => 'string'
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class, 'country_code');
    }
}
