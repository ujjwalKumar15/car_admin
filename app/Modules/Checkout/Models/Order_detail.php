<?php


namespace App\Modules\Checkout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'product_id',
        'qty',
        'tatal_price',

    ];
}
