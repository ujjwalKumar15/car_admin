<?php

namespace App\Modules\Checkout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'user_image',
        'user_aadhar',
        'aadhar_no',
        'user_dl',


    ];
}
