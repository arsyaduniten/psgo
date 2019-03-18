<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    //
    protected $fillable = ['name', 'id_type', 'id_number', 'phone_number', 'email', 'nationality', 'dob', 'gender', 'address_1', 'address_2', 'postcode', 'city', 'state']
}
