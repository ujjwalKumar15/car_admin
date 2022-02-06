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


  
    public function __construct()
    {
        $this->middleware('auth');
    }
      

    public function welcome()
    {
        return view("Brand::Addbrand");
    }

    public function insertdata(Request $request){
        
        
        $request->validate(['name'=>'required|alpha|min:3|unique:brands|max:10|regex:/^\S*$/u'
     ]);

        $brand = new Brand;
        $uid=Auth::user()->id;
        $brand->userid=$uid;
        $brand->name =$request->name;
        // $brand->status=$request->status;
        $brand->save();
        return redirect('Addbrand')->with('status',"Category Added SuccessFully!!");
    }

    public function show(){
  
         $brands = Brand::join('users','users.id','=','brands.userid')->where('status',array('Y'))->orwhere('status',array('N'))->get(['brands.*','users.username']);
         return view("Brand::brandlist",compact("brands"));



    }

    public function changebrandstatus(Request $r)
    {
        $brand = Brand::find($r->id);
        $brand->status = $r->status;
        $brand->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
  
// edit_Brand

public function edit($id)
{
    $brand = Brand::find($id);

    return view('Brand::editbrand',compact('brand'));
}

//update
 public function update(Request $request,$id){
    $request->validate(['name'=>'required|alpha|min:3|max:10|regex:/^\S*$/u|unique:brands,name,'.$id,
]);

    $brand = Brand::find($id);
     $brand->name=$request->name;
     $brand->save();
    return back()->with("status","Category Updated Successfully!!");


 }
 //delete_status
 public function completedUpdatee(Request $r)
 {
      $update = Brand::find($r->id);
     $update->status='T';
     $update->save();
     return Brand::all();
}

//trash only show thoose status are T 
public function Trashbrand(){


    $brands = Brand::join('users','users.id','=','brands.userid')->where('status',array('T'))->get(['brands.*','users.username']);
         return view("Brand::trashbrand",compact("brands"));
         //  $colors = Color::where('status',array('Y','N'))->get();
    //  return view('Color::trash',['colors'=>$users]);
 


   
}


// restore
public function getrestore(Request $r)
    {
         $update = Brand::find($r->id);
        $update->status='Y';
        $update->save();
        return Brand::all();

    }

public function destroy($id){

    Brand::destroy($id);
    return redirect('/admin/brands/trashbrand');



}


}
