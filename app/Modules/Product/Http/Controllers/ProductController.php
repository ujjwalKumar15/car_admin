<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
    */
     public function welcome()
      {
//          // echo '<pre>';

      $Product1 = DB::table('colors')->select('name as cname','id as cid')->where(['status'=>'Y'])->get();
      $Product2 =  DB::table('brands')->select('name as bname','id as bid')->where(['status'=>'Y'])->get();
        return view('Product::addproduct',['colors'=>$Product1,'brands'=>$Product2]);

  }
      
 


   public function insertproduct(Request $request)
   {
    //  Start Insert 
     
    $product = new Product;

     if($request->hasFile('image')){

        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $product->image=$image_name;

     }

     $product->name=$request->pname;
     $product->upc=$request->upc;
     $product->url=$request->url;
     $product->price=$request->price;
     $product->quanty=$request->quanty;
     $product->description=$request->description;
     $product->colorid=$request->color_id;
     $product->brandid=$request->category_id;
     $uid = Auth::user()->id;
     $product->userid=$uid;

     $product->save();
    // multiple_image_insert
     if($request->hasFile('subimage'))
     {
         foreach($request->file('subimage') as $k=>$image)
         {
             if ($request->input('sort')[$k])
             {
                 DB::table('images')->insert(['productid'=>$product->id,'product_images'=>$request->upc.'_'.$k.'.png','sort'=>$request->input('sort')[$k]]);
             }
             else {
                 DB::table('images')->insert(['productid'=>$product->id,'product_images'=>$request->upc.'_'.$k.'.png']);
             }
         $image->storeAs('/public/media' , $request->upc.'_'.$k.'.png');
       }
     }

     return back();

    // End Insert
   
   }

   public function displayproduct(){

    
    $Product = Product::join('colors', 'colors.id', '=', 'products.colorid')
    // ->join('users', 'users.id', '=', 'products.user_id')
       ->join('brands', 'brands.id', '=', 'products.brandid')
       ->where('products.status',array('Y'))
       ->orWhere('products.status',array('N'))
       ->get(['products.*', 'colors.name as cname','brands.name as bname']);
 //   $Product= Product::input();
     return view("Product::listproduct",['products'=>$Product]);


    // return view("Product::listproduct");
   
 
   }
   public function edit($id)
     {
   
   
        $product = Product::find($id);
        $brand = Product::join('brands', 'brands.id', '=', 'products.brandid')->where('products.id',$id)
        ->get(['brands.id as bid', 'brands.name as bname']);
        $colors = DB::table('colors')->select('name as cname','id as cid')->where(['status'=>'Y'])->get();
         return view('Product::editproduct',['brands' => $brand],compact(['colors','product']));
    }
     
    public function update(Request $request,$id)
    
    {
    
      $product = Product::find($id);
       $product->name=$request->name;  
        // $product->upc =$request->upc;
         $product->url=$request->url;
         $product-> price=$request->price;
         $product->quanty=$request->stock;
         $product->description=$request->description;
         $product->colorid =$request->color_id;
        // $product->brandid=$request->brand_id;
          $uid = Auth::user()->id;
         
         $product->userid=$uid;
         $product->save();
         return back();
       // return view('Product::listproduct');
    }








}