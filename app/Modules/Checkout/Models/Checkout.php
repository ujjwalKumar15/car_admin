<?php

namespace App\Modules\Checkout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'first_name',
        'last_name',
        'email',
        'status',
        'phone_number',
        'Address',
        'pincode',


    ];

    
}
