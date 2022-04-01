<?php

namespace App\Modules\Checkout\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\Checkout;
use App\Modules\Checkout\Models\Shipping;
use Illuminate\Support\Facades\Session;
use App\Modules\Cart\Models\Cart;
use App\Modules\Checkout\Models\Order;
use App\Modules\Checkout\Models\Order_detail;


use Faker\Provider\ar_EG\Address;
use Psy\VersionUpdater\Checker;

class CheckoutController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout_billing()
    {

        $uid = Auth::user()->id;
        $Address_datas = Checkout::where('user_id', $uid)->get();
        return view("Checkout::billing", compact('Address_datas'));
    }

    public function store_billing(Request $request)
    {

        $billing_id = $shipping_id = '';
        if ($request->address == '0') {
            $uid = Auth::user()->id;
            $checkout = Checkout::create([
                'user_id' => $uid,
                'first_name' => $request->billing_first_name,
                'last_name' => $request->billing_last_name,
                'email' => $request->billing_email,
                'status' => $request->shipping,
                'phone_number' => $request->billing_phone,
                'Address' => $request->billing_address,
                'pincode' => $request->billing_pincode,

            ]);

            $billing_id = $checkout->id;
        } else {
            $billing_id = $request->address;
        }
        if (isset($request->shipping) && $request->shipping == 1) {
            $shipping_id = $billing_id;
        }
        $checkout_arr = [
            'billing_id' => $billing_id,
            'shipping_id' => $shipping_id,
        ];
 
        session()->put('checkout', $checkout_arr);

       

        if ($request->shipping == '1') {
            return redirect('/payment');
        } else {

            return redirect('/shipping');
        }
    }




    public function checkout_shipping()
    {


        // $a = Session::get('checkout');
        // print_r($a);
        // exit;

        // $store_id = session::get('checkout');
        // dd((int)$store_id['billing_id']);
       
        $uid = Auth::user()->id;
        $Address_datas = Checkout::where('user_id', $uid)->get();
        return view("Checkout::shipping", compact('Address_datas'));
    }



    public function store_shipping(Request $request)
    {

       $store_id = session::get('checkout');
      $billing_id  = $store_id['billing_id'];
    if ($request->address == '0') {
            $uid = Auth::user()->id;
            $checkout = Checkout::create([
                'user_id' => $uid,
                'first_name' => $request->billing_first_name,
                'last_name' => $request->billing_last_name,
                'email' => $request->billing_email,
                'phone_number' => $request->billing_phone,
                'Address' => $request->billing_address,
                'pincode' => $request->billing_pincode,

            ]);


            $shipping_id = $checkout->id;

        } else {
            $shipping_id = $request->address;
        }
        if (isset($request->shipping) && $request->shipping = 1) {
            $shipping_id = $shipping_id;
        }
        $checkout_arr = [
            'billing_id' =>  (int) $billing_id,
            'shipping_id' => (int) $shipping_id,
        ];
 
        session()->put('checkout', $checkout_arr);

         return redirect('/payment');
       
    }

  public function checkout_payment()
    {
        return view("Checkout::payment");


    }

  public function checkout_order_review()
    {
        // dd(session('checkout'));
        // $store = session('checkout');
        // dd($store['billing_id']);
        // // dd(session('billing_id'));

        // $bi
                 
        $store = session('checkout');
    
        $billing_id=$store['billing_id'];
        $shiping_id=$store['shipping_id'];

      $order_items =Cart::join('products', 'products.id', '=', 'carts.product_id')
        ->where('carts.user_id', Auth::id())
        ->get(['products.*','carts.id as cid','carts.qty']);
        
       
        $billing_address = Checkout::where('id',$billing_id)->where('user_id',Auth::id())->get();
        // dd($billing_address);
        $shipping_address = Checkout::where('id',$shiping_id)->where('user_id',Auth::id())->get();
        // dd($shipping_address);
       

         return view("Checkout::order",compact('order_items','billing_address','shipping_address'));
    }

   public function store_order(Request $request)
   {
       $store_session_value = session('checkout');
        
       $billing_id = (int)$store_session_value['billing_id']; 
       $shipping_id = (int)$store_session_value['billing_id']; 
   
    //    dd($request->product_id,$request->price,$request->qty,$request->total_price);

      $order_data = Order::create([
          'user_id'=>Auth::user()->id,
           'shipping_id'=>$shipping_id,
           'billing_id'=> $billing_id,
           'payment_id'=> 1,
           'total_price'=>$request->total_price,
           'total_item'=>$request->qty,
           'order_status'=>'on the way',

       ]);
           
  
      
    //  dd((int)$request->price);
       foreach ($request->product_id as $key=>$value)
       {
           Order_detail::create([
               'order_id'=> $order_data->id,
               'product_id' =>$value,
               'qty' =>$request->qty[$key],
               'total_price'=>$request->total_price[$key]
            ]);


            
            //  Product:: where('id',$value)->
            //  decrement('stock',$request->quantity[$key]);
        }


  }



}
