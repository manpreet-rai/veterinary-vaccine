<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccines extends Model
{
    protected $table = 'vaccines';
    protected $fillable = ['owner_registration', 'vaccine_name', 'vaccine_label', 'vaccinator', 'vaccine_date', 'next_due_date', 'remarks'];
}
