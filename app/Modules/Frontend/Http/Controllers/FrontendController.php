<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
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
   
    public function filter()
    {
        $products = Product::where('status', 'Y')->get();
        $colors = Color::where('status', 'Y')->get();
        $brands = Brand::where('status', 'Y')->get();

        return view('frontend.filter', compact('products', 'colors', 'brands'));
    }
    public function details($url)
    {
        $products = Product::where('status','Y')->get();

        $products = Product::where('url', $url)
            ->where('status', array('Y'))->get();
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id = json_decode($id, true);
        $subimages = image::where('productid', $filter_id)->orderBy('sort', 'asc')->get();
        $products = Product::where('url', $url)->get();
        return view('frontend.details', compact('products', 'subimages'));
    }


    public function price_filter(Request $request)
    {
        $colors = Color::where('status', 'Y')->get();
        $brands = Brand::where('status', 'Y')->get();

    //    $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->get();
        
        if (isset($request->category)&& (isset($request->color)))
        {
            $products=Product::whereIn('brandid',$request->category)->where('colorid',$request->color)
            ->where('status','Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by,$request->order_by)->paginate(5);
        }
        
        elseif (isset($request->category))
        {
            $products=Product::whereIn('brandid',$request->category)
            ->where('status','Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by,$request->order_by)->paginate(5);
        }
        elseif (isset($request->color))
        {
            $products=Product::whereIn('colorid',$request->color)->where('status','Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by,$request->order_by)->paginate(5);
        }
        else{
            $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by,$request->order_by)->paginate(5);
        }


        if ($request->view == 'true') {

            return view('frontend.gridview', compact('products', 'colors', 'brands'));
        } 
        else {
            return view('frontend.listview', compact('products', 'colors', 'brands'));
        }
    }
}
