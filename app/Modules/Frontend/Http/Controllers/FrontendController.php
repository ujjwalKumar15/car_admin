<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\Image;
use App\Modules\Color\Models\Color;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function grid()

    {
        $products = Product::where('status','Y')->get(); 
        return view('frontend.gridview',compact('products'));
    }

    public function list()
    {
       $products = Product::where('status','Y')->get();
       $colors = color::all();
        return view('frontend.listview',compact('products','colors'));
    }

    public function filter()
    {
           $products = Product::all();
           $colors = Color::all();
           return view('frontend.filter',compact('products','colors'));

    }
    public function details($url)
    {
        $products = Product::all();
        
        $products = Product::where('url', $url)
        ->where('status',array('Y'))->get();
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id=json_decode($id,true);
        $subimages=image::where('productid',$filter_id)->orderBy('sort','asc')->get();
         $products = Product::where('url',$url)->get();
        return view('frontend.details',compact('products','subimages'));
    }
  

    public function price_filter(Request $request)
    {

        $products=Product::whereBetween('price',[(int)$request->minimum,(int)$request->maximum])->get();
        $colors = Color::where('status','Y')->get();
     return view("frontend.gridview", compact('products','colors'));
        // $list_value = compact('products','colors');
        // return response()->json([

        //     'status'=>true,
        //     'list_value'=>$list_value,
        //     'message'=>'data found',
        // ]);
        // return response()->json([

        //     'status'=>false,
        //     'message'=>'not found',
        // ]
        
        
    }

}


