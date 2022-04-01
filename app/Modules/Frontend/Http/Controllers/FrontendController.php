<?php

namespace App\Modules\Frontend\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Modules\Cart\Models\Cart;
use App\Modules\Product\Models\{
    Product,
    Image,
};
use App\Modules\Color\Models\Color;
use App\Modules\Brand\Models\Brand;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
 
 
    public function fronthome()
    {
         return view('frontend.index');
      
     } 

  public function filter()
    {
        $products = Product::where('status', 'Y')->get();
        $colors = Color::where('status', 'Y')->get();
        $brands = Brand::where('status', 'Y')->get();

        return view('frontend.filter', compact('products', 'colors', 'brands'));
    }
    public function details($url)
    {
        $products = Product::where('status', 'Y')->get();

        $products = Product::where('url', $url)

            ->where('status', array('Y'))->get();
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id = json_decode($id, true);
        $subimages = image::where('productid', $filter_id)->orderBy('sort', 'asc')->get();
        $products = Product::where('url', $url)->get();
        return view('frontend.details', compact('products', 'subimages'));
    }


    public function addtocat(Request $request)
    {
     
//         if (Auth::check()&& Auth::user()->role ='User')
//    {
          $uid = Auth::user()->id;
         $product = Product::where('id', $request->id)->where('quanty', '>=', $request->quantity)->get();
        //    if(Cart::where('product_id', $request->id)->where('user_id', $uid)->first())
            
        //   {
        //     return response()->json([
        //         'message'=> "product is already added",

        //     ]);


        //   }
     
     
       if (sizeof($product)) {
       cart::updateOrInsert(
        ['user_id' => $uid, 'product_id' => $request->id],
        ['qty' => $request->quantity]

         );

          $minicart = view('frontend.minicart')->render();

            return response()->json([
                'message' => "Data Found",
                'minicart'=>$minicart,
                'code' => 200,

                
               
               
            ]);

            
        } 
        
        else {
            return response()->json([
                'message' => "Data not found internal Server error",
                "code" => 500
            ]);
        }
    //  }
    // else{
    //     $product = Product::where('id',$request->id)->first();
    //     // dd($product);
    //       session::put([
    //             'cart' => json_encode([
    //                 [
    //                     'product_id' =>$product->id,
    //                     'qty' => $request->quantity,
    //                     'price'=>$product->price,
    //                      'name'=>$product->name,
    //                      'image'=>$product->image,
                      
    //                 ]
    //             ])
    //         ]);
             
    //          $a=Session::get('cart');
    //             echo $a;
           
       


    // }
    
}


    public function price_filter(Request $request)
    {
        $colors = Color::where('status', 'Y')->get();
        $brands = Brand::where('status', 'Y')->get();

        //    $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->get();
    
        if (isset($request->category) && (isset($request->color))) {
            $products = Product::whereIn('brandid', $request->category)->where('colorid', $request->color)
                ->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
            
        } elseif (isset($request->category)) {
            $products = Product::whereIn('brandid', $request->category)
                ->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
        } elseif (isset($request->color)) {
            $products = Product::whereIn('colorid', $request->color)->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
        } else {
            $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
        }

        if (!$products->isEmpty()) {

            if ($request->view == 'true') {

                return view('frontend.gridview', compact('products', 'colors', 'brands'));
            } else {
                return view('frontend.listview', compact('products', 'colors', 'brands'));
            }
        } else {
            return view('frontend.notavailable');
        }
    }
}
