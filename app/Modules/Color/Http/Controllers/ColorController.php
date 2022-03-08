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

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view("Color::Addcolor");
    }
    public function insert(Request $request)
    {
        $colors = new Color;
        $uid = Auth::user()->id;
        $colors->userid = $uid;
        $colors->name = $request->name;
        $colors->save();
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
        $colors = Color::find($r->id);
        $colors->status = $r->status;
        $colors->save();
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

        $colors = Color::find($id);
        $colors->name = $request->name;
        $colors->save();
        return back()->with('status', "Color Updated SuccessFully!!");
    }
    public function deletestatus(Request $r)
    {
        $update = Color::find($r->id);
        $update->status = 'T';
        $update->save();
        return Color::all();
    }


    public function trashview()
    {
        $users = Color::join('users', 'users.id', '=', 'colors.userid')->where('status', array('T'))
            ->get(['colors.*', 'users.username']);

        return view('Color::trash', ['colors' => $users]);
    }

    public function restore(Request $r)
    {
        $update = Color::find($r->id);
        $update->status = 'Y';
        $update->save();
        return Color::all();
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
