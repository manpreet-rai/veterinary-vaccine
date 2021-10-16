<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $fillable = ['owner_name', 'owner_email', 'owner_phone1', 'owner_phone2', 'owner_address', 'owner_registration', 'pet_name', 'pet_breed', 'pet_gender', 'pet_colour', 'pet_breeder_address'];
}
