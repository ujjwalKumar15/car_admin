<?php



namespace App\Modules\Checkout\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[

        'user_id',
        'shipping_id',
        'billing_id',
        'payment_id',
        'total_quantity',
        'total_price',
        'total_item',
        'order_status',
    ]; 
}
