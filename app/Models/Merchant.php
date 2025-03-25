<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $table = 'merchants';
    protected $fillable = [
        'type',
        'merchant_name',
        'country_code',
        'address',
        'phone_number',
        'dob',
    ];
    protected $casts = [
        'id'            => 'integer',
        'type'          => 'string',
        'merchant_name' => 'string',
        'country_code'  => 'string',
        'address'       => 'string',
        'phone_number'  => 'string',
        'dob'           => 'string',   
    ];
}
