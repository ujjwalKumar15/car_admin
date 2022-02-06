<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
     public function welcome()
     {
        return view("Product::addproduct");
    }

   public function insertproduct()
   {
        return view("Product::addproduct");

   }

   public function displayproduct(){

    return view("Product::listproduct");
   
}



}
