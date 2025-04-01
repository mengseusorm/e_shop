<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Merchant extends Model
{
    use HasFactory;

    protected $table = 'merchants';

    protected $fillable = [
        'type',
        'merchant_name',
        'country_code_id',
        'address',
        'phone_number',
        'dob',
    ];

    protected $casts = [
        'id'               => 'integer',
        'type'             => 'string',
        'merchant_name'    => 'string',
        'country_code_id'  => 'integer',
        'address'          => 'string',
        'phone_number'     => 'string',
        'dob'              => 'date',
    ];

    public function country()
    { 
        return $this->belongsTo(CountryCode::class, 'country_code_id');
    }

    // Optional: Mutator for date of birth
    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}