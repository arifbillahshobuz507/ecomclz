<?php

namespace App\Http\Controllers\backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
  public function backendHomePage()
  {
    echo view("backend.home.index");
  }

  // List admin 
  public function list()
  {
    $admins = Admin::paginate(3);
    // dd($admins);
    return view("backend.pages.admin.list", compact('admins'));
  }


  //Add admin code 
  public function from(Request $request)
  {       
    return view("backend.pages.admin.form");
  }

  // store admin code 
  public function store(Request $request)
  {    
      // dd($request->all());
      // Validate request data
      $validate = Validator::make($request->all(), [
        'gmail' => 'required',
        'phone' => 'required',
        'password' => 'required',
      ]);

      if($validate->fails()) {
        return redirect()->back()->withErrors($validate);;
      } 
        
      // Hash the password beroe storing
      $hashedPassword = bcrypt($request->password);

      //Create admin
      Admin::create([        
        'gmail' => $request->gmail,
        'phone' => $request->phone,
        'password' => $hashedPassword,
        'role'=>'admin'
      ]);

      notify()->success('Admin Create Susscess!');

      // Redirect ot the 'admin' route
    return redirect()->route('admin');
  }

  
  public function delete($id)
  {
    $admins = Admin::find($id);
    // dd($admins);
    // Check if the admin exists
    if($admins)
    {
      //delete admin
      $admins->delete();

      //Notify about the success
      notify()->success('Admin delete success');

      //REdurect ti the 'admin' route
      return redirect()->route('admin');
    }else{
      notify()->error('Admin not found');

      return redirect()->route('admin');
    }
  }
  public function edit($id)
  {
    $admins = Admin::find($id);
    // dd($admins);
    if($admins)
    {
      return view("backend.pages.admin.edit", compact('admins'));
    }
  }

  // Update Admin code 
  public function update(Request $request, $id)
  {
    $admins = Admin::find($id);
    // dd($admins);

    // dd($request->all());
    // Validate request data
    $validate = Validator::make($request->all(), [      
      'gmail' => 'required',
      'phone' => 'required',        
    ]);

    //Check validate
    if ($validate->fails()) {      
      return redirect()->back()->withErrors($validate);
    }else{
      $admins->update([
        'gmail' => $request->gmail,
        'phone' => $request->phone,
      ]);

      notify()->success('Admin Update successfully.');
      return redirect()->route('admin');

    }
    // dd($request->all());
   
  }

  public function view($id)
  {
    $admins = Admin::find($id);

    if($admins)
    {
      return view("backend.pages.admin.view", compact('admins'));
    }
  }












  
  public function profile()
  {
    $admins = Admin::all();
    // dd($admins);
    return view("backend.pages.admin_profile.profile",compact('admins'));
  }

  public function edit_profile($id)
  {
    $admins = Admin::find($id);
    return view('backend.pages.admin_profile.edit',compact('admins'));   
  }
  public function update_profile(Request $request , $id){
    // dd($request->input());
    $admins = Admin::find($id);

    if($admins){
      $fileName = null;
      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $fileName = date('Ymdhis'). ".". $file->getClientOriginalName();
          $file->storeAs('/profile/image', $fileName);
      }
      // $admins->update->$request->input()->except(['_token','image']);
      $admins->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gmail' => $request->gmail,
        'phone' => $request->phone,
        'role' => 'Admin',
        'image' => $fileName,
        'address' => $request->address,
        'age' => $request->age,
        'gender' => $request->gender,
        'birth_day' => $request->birth_day,
        'description' => $request->description
      ]);
      return redirect()->back()->with('success','Profile Updated Successfully');
    }
  }







































  public function form()
  {
    return view("backend.pages.admin.form");
  }
  

}
