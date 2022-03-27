<?php

namespace App\Modules\Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Brand\Models\Brand;
use  Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        return view("Brand::Addbrand");
    }

    public function insert(Request $request)
    {

        $request->validate([
            'name' => 'required|alpha|min:3|unique:brands|max:10|regex:/^\S*$/u'
        ]);
        $uid=Auth::user()->id;
        Brand::create(['name'=>$request->name,'userid'=>$uid]);

        return back()->with('status', "Category Added SuccessFully!!");
    }

    public function show()
    {

        $brands = Brand::join('users', 'users.id', '=', 'brands.userid')->where('status', array('Y'))->orwhere('status', array('N'))->get(['brands.*', 'users.username']);
        return view("Brand::brandlist", compact("brands"));
    }

    public function changestatus(Request $r)
    {
        Brand::where('id',$r->id)->update(['status'=>$r->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }


    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('Brand::editbrand', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|alpha|min:3|max:10|regex:/^\S*$/u|unique:brands,name,' . $id,
        ]);

        Brand::where('id',$id)->update(['name'=>$request->name]);
        return back()->with("status", "Category Updated Successfully!!");
    }

    public function deletestatus(Request $r)
    {
        Brand::where('id',$r->id)->update(['status'=>'T']);
        return response()->json(['status','Brand Deleted Successfully!!']);
    }

    public function Trashshow()
    {


        $brands = Brand::join('users', 'users.id', '=', 'brands.userid')->where('status', array('T'))->get(['brands.*', 'users.username']);
        return view("Brand::trashbrand", compact("brands"));
    }


    public function restore(Request $r)
    {
        Brand::where('id',$r->id)->update(['status'=>'Y']);
        // $update = Brand::find($r->id);
        // $update->status = 'Y';
        // $update->save();
        // return Brand::all();
        return response()->json(['status','status change Successfully!!'

        ]);
    }

    public function destroy($id)
    {

        Brand::destroy($id);
        return redirect('/admin/brands/trashbrand');
    }
    public function uniquename(Request $r){

        $brands = Brand::where('id', '!=',$r->id)->where('name',$r->name)->first();
        if (isset($brands)) {
          return json_encode(false);
        } else {
          return json_encode(true);
        }

    }
}
