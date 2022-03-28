<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Color\Models\Color;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Unique;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view("Color::Addcolor");
    }
    public function insert(Request $request)
    {
         $uid = Auth::user()->id;
         Color::create(['name' => $request->name,'userid'=>$uid]);
         return back()->with('status', 'Color Added !!');

    }

    public function view()
    {
        $users = Color::join('users', 'users.id', '=', 'colors.userid')->where('status', array('Y'))->orWhere('status', array('N'))
            ->get(['colors.*', 'users.username']);

        return view('Color::list', ['colors' => $users]);
    }

    public function changeStatus(Request $r)
    {
        color::where('id',$r->id)->update(['status'=>$r->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }


    public function edit($id)
    {
        $colors = Color::find($id);
        return view('Color::edit', compact('colors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|alpha|min:3|max:10|regex:/^\S*$/u|unique:colors,name,' . $id,

        ]);

        color::where('id',$id,)->update(['name'=>$request->name]);

        return back()->with('status', "Color Updated SuccessFully!!");
    }
    public function deletestatus(Request $r)
    {

        Color::where('id',$r->id)->update(['status'=>'T']);
        return response()->json(['status'=>"color_data delete successfully!!"]);
      
    }

    

    public function trashview()
    {
        $users = Color::join('users', 'users.id', '=', 'colors.userid')->where('status', array('T'))
            ->get(['colors.*', 'users.username']);

        return view('Color::trash', ['colors' => $users]);
    }

    public function restore(Request $r)
    {
        color::where('id',$r->id)->update(['status'=>'Y']);
        return response()->json(['status','Color Restore SuccessFully !!']);

    }


    public function destroy($id)
    {

        Color::destroy($id);
        return redirect('trash');
    }

    public function uniquename(Request $r)
    {


        $colors = Color::where('id', '!=', $r->id)->where('name', $r->name)->first();
        if (isset($colors)) {
          return json_encode(false);
        } else {
          return json_encode(true);
        }

    }
}
