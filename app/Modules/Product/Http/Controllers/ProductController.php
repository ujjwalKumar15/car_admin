<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\Image;
use App\Modules\Color\Models\Color;
use App\Modules\Brand\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


  /**
   * Display the module welcome screen
   *
   * @return \Illuminate\Http\Response
   */



  public function create()
  {
    $Product1 = Color::select('name as cname', 'id as cid')->where(['status' => 'Y'])->get();
    $Product2 = Brand::select('name as bname', 'id as bid')->where(['status' => 'Y'])->get();
    return view('Product::addproduct', ['colors' => $Product1, 'brands' => $Product2]);
  }

  public function insert(Request $request)
  {

    $request->validate([
      'name' => 'required|max:100|unique:products',
      //  'image' => 'required|mimes:jpg,png,jpeg,gif',
      'subimage[]' => 'mimes:jpg,png,jpeg,gif',
      'upc' => ['required
      ', 'unique:products', 'regex:/[0-9]{12,13}$/'],
      'price' => ['required', 'regex:/^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/'],
      'quanty' => 'required|integer|max:999999',
      //  'sort[]' => 'required|integer|max:10|min:1',
      'description' => 'max:250',
      'color_id' => 'required',
      'category_id' => 'required',

      'url' => 'unique:products'

    ]);

     $product = new Product;
    

    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $ext = $image->extension();
      $image_name = time() . '.' . $ext;
      $image->storeAs('/public/media', $image_name);
     $product->image = $image_name;
    }

    $uid = Auth::user()->id;

    $product =Product::create([
      'image' => $image_name,
      'name' => $request->name,
      'upc' => $request->upc,
      'url' => $request->url,
      'price' => $request->price,
      'quanty' => $request->quanty,
      'description' => $request->description,
      'colorid' => $request->color_id,
      'brandid' => $request->category_id,
      'userid' => $uid,
    ]);

  

    if ($request->hasFile('subimage')) {
      foreach ($request->file('subimage') as $key => $insert) {

        $imageName = time() . '-' . $insert->getClientoriginalName();
        $insert->storeAs('/public/media', $imageName);
        $save_sub_image = [

          'productid' => $product->id,
          'product_images' => $imageName,
          'sort' => $request->sort[$key],

        ];

        image::insert($save_sub_image);
      }
    }
    return redirect('/admin/products/addproduct')->with('status', 'Product Added SuccessFully!!!!');
  }

  public function display()
  {
    $Product = Product::join('colors', 'colors.id', '=', 'products.colorid')
      ->join('brands', 'brands.id', '=', 'products.brandid')
      ->where('products.status', array('Y'))
      ->orWhere('products.status', array('N'))
      ->get(['products.*', 'colors.name as cname', 'brands.name as bname']);
    return view("Product::listproduct", ['products' => $Product]);
  }
  public function edit($id)
  {


    $product = Product::find($id);
    $brand = Product::join('brands', 'brands.id', '=', 'products.brandid')->where('products.id', $id)
      ->get(['brands.id as bid', 'brands.name as bname']);
    $colors = DB::table('colors')->select('name as cname', 'id as cid')->where(['status' => 'Y'])->get();

    $images = Image::where('productid', $id)->get();
    return view('Product::editproduct', ['brands' => $brand], compact(['colors', 'product', 'images']));
  }

  public function update(Request $request, $id)

  {


    $product = Product::find($id);

    if ($request->hasFile('image')) {

      $image = $request->file('image');
      $ext = $image->extension();
      $image_name = time() . '.' . $ext;
      $image->storeAs('/public/media', $image_name);
      $product->image = $image_name;
    }

    $product->name = $request->name;
    $product->url = $request->url;
    $product->price = $request->price;
    $product->quanty = $request->stock;
    $product->description = $request->description;

    $product->colorid = $request->color_id;
    $uid = Auth::user()->id;

    $product->userid = $uid;
    $product->save();

    // 
    if ($request->input('img_id')) {
      $img = image::where('productid', $id)->whereNotIn('id', $request->input('img_id'))->get();
      foreach ($img as $item) {
        echo $item->name . '<br>';
        File::delete('/public/media' . $request->upc . '/' . $item->name);
        $item->delete();
      }
    } else {
      $img = image::where('productid', $id)->get();
      foreach ($img as $item) {
        echo $item->name . '<br>';
        File::delete('/public/media' . $request->upc . '/' . $item->name);
        $item->delete();
      }
    }

    if ($request->hasFile('sub_img')) {
      foreach ($request->file('sub_img') as $k => $image) {
        if ($request->input('img_id')[$k]) {

          if ($request->input('sort')[$k]) {

            image::where('id', $request->input('img_id')[$k])->update(['product_images' => $request->upc . '_' . time() . '.png', 'sort' => $request->input('sort')[$k]]);
          } else {
            image::where('id', $request->input('img_id')[$k])->update(['product_images' => $request->upc . '_' . time() . '.png']);
          }
          $image->storeAs('/public/media', $request->upc . '_' . time() . '.png');
        } else {

          if ($request->input('sort')[$k]) {
            image::create(['productid' => $request->id, 'product_images' => $request->upc . '_' . time() . '.png', 'sort' => $request->input('sort')[$k]]);
          } else {
            image::create(['productid' => $request->id, 'product_images' => $request->upc . '_' . time() . '.png']);
          }
          $image->storeAs('/public/media', $request->upc . '_' . time() . '.png');
        }
      }
    }

    return back()->with('status', 'Data Updated SuccessFully!!!');
  }

  public function ChangeStatus(Request $request)
  {

    product::where('id',$request->id)->update(['status'=>$request->status]);
    return response()->json(['status' => "Status Change SuccessFully"]);
  }

  public function delete(Request $request)
  {
    product::where('id',$request->id)->update(['status'=>'T']);

    return response()->json([
      'status','status Updated Successfully!!'

    ]);
  }

  public function trash()
  {

    $Product = Product::join('colors', 'colors.id', '=', 'products.colorid')
      ->join('brands', 'brands.id', '=', 'products.brandid')
      ->where('products.status', array('T'))
      ->get(['products.*', 'colors.name as cname', 'brands.name as bname']);
    return view("Product::trashproduct")->with(['products' => $Product]);
  }

  public function RestoreTrash(Request $request)
  {
   product::where('id',$request->id)->update(['status'=>'Y']);
    return response()->json(['status','Restore Successfully!!']);
  }
  public function uniqueupc(Request $request)
  {

    $product = Product::where('id', '!=', $request->id)->where('upc', $request->upc)->first();
    if (isset($product)) {
      return json_encode(false);
    } else {
      return json_encode(true);
    }
  }

  public function uniqueproduct(Request $request)
  {
    $product = Product::where('id', '!=', $request->id)->where('name', $request->name)->first();
    if (isset($product)) {
      return json_encode(false);
    } else {
      return json_encode(true);
    }
  }

  public function checkUrl(Request $request)
  {
    $product = Product::where('id', '!=', $request->id)->where('url', $request->url)->first();
    if (isset($product)) {
      return json_encode(false);
    } else {
      return json_encode(true);
    }
  }
}
