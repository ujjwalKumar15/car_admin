<?php

namespace App\Http\Controllers;

use App\Models\Userstaus;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Modules\Product\Models\Product;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


       
        $role = Auth::user()->role;
        if($role=='Admin')
        {
            return view('template');

        }
        else
        {
            return view('frontend.index');
        }

    }

    public function fronthome()
    {
       
        $role = Auth::user()->role;
        if($role=='Admin')
        {
            return view('template');

        }
        else
        {
            return view('frontend.index');
        }


      
    } 

}
