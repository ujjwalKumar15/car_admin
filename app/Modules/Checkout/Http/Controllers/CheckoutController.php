<?php

namespace App\Modules\Checkout\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\Checkout;
use App\Modules\Checkout\Models\Shipping;
use Illuminate\Support\Facades\Session;
use App\Modules\Cart\Models\Cart;
use App\Modules\Product\Models\Product;
use App\Modules\Checkout\Models\Order;
use App\Modules\Checkout\Models\Order_detail;
use App\Modules\Checkout\Models\payment;


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
        // $msg=['mobile_number.regex'=>'Please Enter a valid phone number'];
        //  $request->validate([
        //         'billing_first_name' => 'required|max:50',
        //         'billing_last_name'=>'required|max:50',
        //         'billing_email' => 'required|email|max:60',
        //         'billing_address' => 'required|max:250',
        //         'billing_phone' => ['required','regex:/^(\+\d{1,3}[- ]?)?\d{10}$/'],
        //         'billing_pincode' => 'required|integer|digits:6',
        //     ],$msg);


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

        // $msg=['mobile_number.regex'=>'Please Enter a valid phone number'];
        // $request->validate([
        //        'billing_first_name' => 'required|max:50',
        //        'billing_last_name'=>'required|max:50',
        //        'billing_email' => 'required|email|max:60',
        //        'billing_address' => 'required|max:250',
        //        'billing_phone' => ['required','regex:/^(\+\d{1,3}[- ]?)?\d{10}$/'],
        //        'billing_pincode' => 'required|integer|digits:6',
        //    ],$msg);

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
        if (isset($request->shipping) && $request->shipping == 1) {
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

    public function store_payment(Request $request)
    {

        $store_id = session::get('checkout');
         $billing_id  = $store_id['billing_id'];
       $user_details=Checkout::where('id',$billing_id)->first();
    //    print_r($user_details);
    //    die();
    //    dd($user_details);
       

        $data = [
            'user_id'=>Auth::id(),
            'first_name'=>$user_details->first_name,
            'last_name'=>$user_details->last_name,
            'payment_method'=>$request->payment_method,
        ];
        $payment_data= payment::create($data);

        $payment=[
            'payment_id'=>$payment_data->id,
        ];
        session()->put('payment', $payment );

        return redirect('/order')->with('status', 'payment method  successfully added');
    

      
    }


    public function checkout_order_review()
    {


        $store = session('checkout');

        $billing_id = $store['billing_id'];
        $shiping_id = $store['shipping_id'];

        $order_items = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->get(['products.*', 'carts.id as cid', 'carts.qty']);


        $billing_address = Checkout::where('id', $billing_id)->where('user_id', Auth::id())->get();

        $shipping_address = Checkout::where('id', $shiping_id)->where('user_id', Auth::id())->get();



        return view("Checkout::order", compact('order_items', 'billing_address', 'shipping_address'));
    }

    public function store_order(Request $request)
    {

        $store_session_value = session('checkout');

        $payment_method = Session::get('payment');
        $payment_id=(int) $payment_method['payment_id'];
    

        $billing_id = (int)$store_session_value['billing_id'];
        $shipping_id = (int)$store_session_value['billing_id'];

        $order_data = Order::create([
            'user_id' => Auth::user()->id,
            'shipping_id' => $shipping_id,
            'billing_id' => $billing_id,
            'payment_id' => $payment_id,
            'total_quantity' => $request->total_quantity,
            'total_price' => $request->total_price,
            'order_status' => 'on the way',

        ]);


   foreach ($request->product_id as $key=>$value)
            {
     
     
        //    dd($request->sub_total);
                Order_detail::insert([
                    'order_id'=> $order_data->id,
                    'product_id' =>$value,
                    'qty' =>$request->qty[$key],
                   'total'=>$request->sub_total[$key],
                 ]);
        }

        $Product_id = Product::where('id',$value)->decrement('quanty', $request->qty[$key]);

       

        Cart::where('User_id', Auth::user()->id)->delete();

        return redirect('/');

       
    }




    public function myorders()
    {

        // $store = session('checkout');


        // $billing_id = $store['billing_id'];
        // $shiping_id = $store['shipping_id'];



        // $billing_address = Checkout::where('id', $billing_id)->where('user_id', Auth::id())->get();

        // $shipping_address = Checkout::where('id', $shiping_id)->where('user_id', Auth::id())->get();


        // $orders = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
        //     ->where('orders.user_id', Auth::id())
        //     ->join('products', 'products.id', '=', 'order_details.product_id')
        //     ->get(['products.*', 'order_details.*', 'orders.*']);

           $orders=Order::where('user_id',Auth::id())->get();
    

        $billing_address = Checkout::where('id', $orders[0]['billing_id'])->where('user_id', Auth::id())->get();
          $shipping_address = Checkout::where('id',$orders[0]['shipping_id'])->where('user_id', Auth::id())->get();

          // dd($orders);   
        return view('Checkout::myorders', compact('orders', 'billing_address', 'shipping_address'));
    }



    public function myorder_view($id)
    {

      $address = Order::where('orders.id', $id)
        ->join('payments', 'payments.id', '=', 'orders.payment_id')
        ->first();
    $order = Order::where('id', $id)->first();

    $order_details = Order_detail::where('order_id', $id)
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('brands', 'brands.id', '=', 'products.brandid')
        ->join('colors', 'colors.id', '=', 'products.colorid')
        ->get(['products.*', 'order_details.*', 'brands.name as brand_name', 'colors.name as color_name']);
    return view("Checkout::myorderview", compact('address', 'order', 'order_details'));
    

    }
}
