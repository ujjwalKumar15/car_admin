<?php

namespace App\Modules\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use App\Modules\Cart\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
   

    public function AddtoCart()
    {

        
        $cart_items =Cart::join('products', 'products.id', '=', 'carts.product_id')
        ->where('carts.user_id', Auth::id())
        ->get(['products.*','carts.id as cid','carts.qty']);

        // dd($cart_items);
          return view("Cart::cart",compact("cart_items"));
         

       
    }

    public function update_qty(Request $request){

        $uid = Auth::user()->id;
 
        $product = Product::where('id', $request->id)->where('quanty', '>=', $request->quantity)->get();
        $price = $request->price * $request->quantity;
       
       
        
    
     
        if (sizeof($product)) {
        
        cart::updateOrInsert(
        ['user_id' => $uid, 'product_id' => $request->id],
        ['qty' => $request->quantity]
        
      );

   return response()->json([
                 'price'=>$price,
                'message' => "Data Found",
                'code' => 200,
                'data' => $product,
            ]);
        } 
        
        else {
            return response()->json([
                'message' => "Data not found internal Server error",
                "code" => 500
            ]);
        }



          
    }

    public function delete(Request $request)
    {
        cart::where('id', $request->id)->delete();
         return back()->with('status','remove successfully');

    }

     

 
}
