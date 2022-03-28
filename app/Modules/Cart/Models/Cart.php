<?php

namespace App\Modules\Cart\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\product;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',


    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    } 
}
