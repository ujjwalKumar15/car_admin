<?php

namespace App\Http\Controllers;

use App\Models\Userstaus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        return view('template');
    }
    function checkstatus(){
        $color = Userstaus::get();
        return view('checkstatus',compact('color'));
    }
    function changesStatus(Request $r){
        $color = Userstaus::find($r->id);
        $color->status=$r->status;
        $color->save();
        return response()->json(['success'=>'Status changed successfully']);

    }
}
