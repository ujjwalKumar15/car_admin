<?php

namespace App\Modules\OrderMaster\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
use App\Modules\Checkout\Models\Checkout;
use App\Modules\Checkout\Models\Order;
use App\Modules\Checkout\Models\Order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderMasterController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $orders_master = Order::join('payments', 'payments.id', '=', 'orders.payment_id')
            ->get(['orders.*', 'orders.id as order_id', 'payments.*']);
        // return view("Order::display", compact('order'));
      
       return view("OrderMaster::list",compact('orders_master'));
    }
    public function invoice_view($id)
    {

       // dd($id);

        // $store = session('checkout');

        // $billing_id = $store['billing_id'];
        // $shiping_id = $store['shipping_id'];



        // $billing_address = Checkout::where('id', $billing_id)->where('user_id', Auth::id())->get();

        // $shipping_address = Checkout::where('id', $shiping_id)->where('id', Auth::id())->get();

       // dd($billing_address,$shipping_address);


        $address = Order::where('orders.id', $id)
        ->join('payments', 'payments.id', '=', 'orders.payment_id')
        ->first();
    $order = Order::where('id', $id)->first();

    $order_details = Order_detail::where('order_id', $id)
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('brands', 'brands.id', '=', 'products.brandid')
        ->join('colors', 'colors.id', '=', 'products.colorid')
        ->get(['products.*', 'order_details.*', 'brands.name as brand_name', 'colors.name as color_name']);
    return view("OrderMaster::invoice", compact('address', 'order', 'order_details'));

        // return view("OrderMaster::invoice");
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('OrderMaster::edit', compact('order'));
    }
    public function update(Request $request,$id)
    {
        Order::where('id',$id)->update(['order_status'=>$request->order_status]);
        
        return redirect('/admin/orders')->with('success','Item Updated successfully!');
        // $data=Order::all();
    }
}
