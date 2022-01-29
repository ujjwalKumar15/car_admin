<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Color\Models\Color;
use  Illuminate\Support\Facades\Auth;
class ColorController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Color::Addcolor");
    }
    public function getdata(Request $request){
     
        //ujjwal@code 

        $colors =new Color;
        $uid= Auth::user()->id; //userid pass by controller
        $colors->userid=$uid;
         $colors->name=$request->name;
        
         $colors->status=$request->status;
         $colors-> save();
         return redirect('Addcolor')->with('status','Color Added !!');
        //  $data= Color::all();
        //   return view('Color::ff',['datas'=>$data]);
        
    }
    public function show()
    {
        // $data= Color::all();
        // return view('Color::list',['datas'=>$data]);
        $users = Color::join('users', 'users.id', '=', 'colors.userid')->where('status',array('Y'))->orWhere('status',array('N'))
        ->get(['colors.*', 'users.username']);
        // $colors = Color::get();
        return view('Color::list',['colors'=>$users]);
    }
    // >where('status',array('Y'))-> orWhere('status',array('N'))
    public function changeStatus(Request $r)
    {
        $colors = Color::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
 

    public function edit($id)
    {

      $colors = Color::find($id);
      return view('Color::edit',compact('colors'));
    }
    public function update(Request $request,$id)
    {
       $colors = Color::find($id);
       $colors->name = $request->name;
       $colors->save();

     return redirect('list');   //return redirect($url)->with('success', 'Data saved successfully!');

    }

    public function completedUpdate(Request $r)
    {
         $update = Color::find($r->id);
        $update->status='T';
        $update->save();
        return Color::all();
}

public function trashshow(){

    
    $users = Color::join('users', 'users.id', '=', 'colors.userid')->where('status',array('T'))
        ->get(['colors.*', 'users.username']);
//  $colors = Color::where('status',array('Y','N'))->get();
    return view('Color::trash',['colors'=>$users]);



}

// restore
public function completedUpdated(Request $r)
    {
         $update = Color::find($r->id);
        $update->status='Y';
        $update->save();
        return Color::all();

    }

 //Delete
 function destroy($id)
 {

  Color::destroy($id);
  return redirect('trash');
 }   

 //try 

 function set(){

    return view("Color::try");
 }

}
