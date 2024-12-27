<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteModel;
use DB;

class PremiumController extends Controller
{

    public function __construct()
{
    $this->middleware('admin');
}
//COURSES

  public function ins_premium_update(Request $request)
{
    // echo"jj";
    // exit();
   
  $institute = InstituteModel::where('id',$request->id)->first();
//   print_r($institute);
//   exit();
  $institute->premium =$request->action;
  $institute->save();
  return redirect('institution?tab=2&&cat='.$_GET['cat'])->withSuccess('Premium Action Taken');
 // return back()->with('status','Updated successfully');
}

  public function premium()
  {
    $institute = InstituteModel::where('action',0)->paginate(1);
    $institute->appends(['tab'=>1]);
    $instituteapp = InstituteModel::where('action',1)->paginate(1);
  
    $instituteapp->appends(['tab'=>2]);
    $institutereg = InstituteModel::where('action',2)->paginate(1);
    $institutereg->appends(['tab'=>3]);
    $title = 'All Listings';
    return view('admin.premium.premium',compact('institute','instituteapp','institutereg'));
 }
 public function  premium_search()
  {
    // echo"hi";exit();
    $institute = InstituteModel::where('action',0)->paginate(1);
    $instituteapp = InstituteModel::where('action',1)->paginate(1);
    $institutereg = InstituteModel::where('action',2)->paginate(1);
    if($_GET['tab']==1)
{
    if($_GET['type']==1)
    {
      $institute = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
    }
    else if($_GET['type']==2)
    {    $institute = InstituteModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
     
    }
    else if($_GET['type']==3)
    {
      $institute = InstituteModel::
      Leftjoin('users', 'institute.user_id', '=', 'users.id')
      ->select('*','users.id as id')
      ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
      ->where('action',0)
      ->paginate(1);
    }
    else
    {
      $institute = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
    }
}else if($_GET['tab']==2)
{
  if($_GET['type']==1)
  {
    $instituteapp = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }
  else if($_GET['type']==2)
  {    $instituteapp = InstituteModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
   
  }
  else if($_GET['type']==3)
  {
    $instituteapp = InstituteModel::
    Leftjoin('users', 'institute.user_id', '=', 'users.id')
    ->select('*','users.id as id')
    ->where('action',1)
    ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
    ->paginate(1);
  }
  else
  {
    $instituteapp = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }

}
else
{
  if($_GET['type']==1)
  {
    $institutereg = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',2)->paginate(1);
  }
  else if($_GET['type']==2)
  {    $institutereg = InstituteModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',2)->paginate(1);
   
  }
  else if($_GET['type']==3)
  {
    $institutereg = InstituteModel::
    Leftjoin('users', 'institute.user_id', '=', 'users.id')
    ->select('*','users.id as id')
    ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
    ->where('action',2)
    ->paginate(1);
  }
  else
  {
    $institutereg = InstituteModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }
} 
    $title = 'All Listings';
    $institute->appends(['tab'=>1,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
    $institutereg->appends(['tab'=>3,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
    $instituteapp->appends(['tab'=>2,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
  // print_r( $listing );exit();
  return view('admin.premium.premium',compact('institute','title','institutereg','instituteapp'));
  }
  
  
    

    
    
    
  
}
