<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingsModel;
use Illuminate\Support\Facades\Session;



use DB;

class SettingsController  extends Controller
{

  public function settings()
  {
    
      $settingsdata=SettingsModel::get();
      $title = 'All Listings';
      return view('admin.settings.index',compact('title','settingsdata'));
  }


  public function settings_edit($id)
  {

    // echo"hi";
    // exit();
        $settingsdata=SettingsModel::find($id);

       return view('admin.settings.edit', compact('settingsdata'));
  }



  public function settings_update(Request $request)
  {
   
     // $id=$unit->id;

     $id=$request->id;
     $prop=SettingsModel::find($id);
     $customMessages = [
      'image.required' => 'You must upload an image.',
      'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
      'image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
      'image.max' => 'The image size must not exceed 2MB.',
  ];
$request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
  ], $customMessages);
if($request->file('image'))
{
  $file= $request->file('image');
  $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
  $extension = $request->image->getClientOriginalExtension(); // Get the original file extension
  // $filename = $uniqueNumber . '.' . $extension;

  $filename= date('YmdHi').$file->getClientOriginalName();
  $upload=$file->move(('public/images/logo'),$filename);
  $imagePath = public_path('images/logo/'.$prop->logo);
  if($upload)
  {
  unlink($imagePath);
  }

}
     $prop->phone  =$request->phone;
     $prop->phone1  =$request->phone1;
     $prop->phone2  =$request->phone2;
     $prop->email=$request->email;
     $prop->logo=$filename;
     $prop->address=$request->address;
     $prop->save();

    $alert = ['success','Updated successfully'];
    return back()->withAlert($alert);
  
  }
  
  
   
  
 }