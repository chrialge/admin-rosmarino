<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = ['customer_name', 'customer_last_name', 'customer_telephone', 'customer_email', 'date', 'hour_reservation', 'person'];
}
