<?php

// use App\Modules\Checkout\Models\address;
use App\Modules\Checkout\Models\Checkout;


function getBillingAddress($id = '')
{
    $billing_address =Checkout::where('id',$id)->get();
    return $billing_address;
}
function getShippingAddress($id = '')
{
    $shipping_address =Checkout::where('id',$id)->get();
    return $shipping_address;
}