<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
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
        $products = Product::all();

        return view('frontend.  gridview',compact('products'));
    }
    public function list()
    {
       $products = Product::all();
        return view('frontend.listview',compact('products'));
    }


}
