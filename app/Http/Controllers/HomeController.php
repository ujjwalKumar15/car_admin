<?php

namespace App\Http\Controllers;

use App\Models\Userstaus;
use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Modules\Product\Models\Product;


class HomeController extends Controller
{

    public function index(){
        // $role = Auth::user()->role;
        // if($role=='Admin')
        // {
            
            return view('template');



        // }
        // else
        // {
        //     return view('frontend.index');
        
        // }

    }

  
}
