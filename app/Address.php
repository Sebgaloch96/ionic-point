<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'country',
        'postcode',
        'lat',
        'lng'
    ];

    public function addressable() 
    {
        return $this->morphTo();
    }
}
