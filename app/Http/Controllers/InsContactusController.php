<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsContactusModel;
use DB;

class InsContactusController extends Controller
{

//     public function __construct()
// {
//     $this->middleware('auth');
// }

//COURSES

  
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

//   public function message()
//   {
    
//       $message=Messagemodel::get();
//       $title = 'All Listings';
//       return view('admin.message.index',compact('title','message'));
//   }




  
  public function contactus_store(Request $request)
  {
    //   echo "hi";
    //   exit();
  $centreaddarray = array(
      'institute'=>$request->institute,
      'name'=>$request->name,
      'contact'=>$request->contact,
      'email'=>$request->email,
      'message'=>$request->message,
      'role'=>$request->role
  );
   $message = InsContactusModel::create($centreaddarray);

  if($message){
    return back()->with('status','Message sent successfully. We will get back to you shortly');
}
else{
     return back()->with('errstatus','Failed To Send Message');
}

    // $alert = ['status','Message Sent Successfully'];
    //  return back()->withAlert($alert);
  
  }
  
  
    public function contactdata_destroy($id)
  {
    $contactdata=InsContactusModel::find($id);
    $contactdata->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }
  
  
  public function queriesdata()
  {
    // echo "hi";
    // exit();
      $queriesdata=InsContactusModel::where('role',1)->get();
      $title = 'All Listings';
      return view('admin.queries.index',compact('title','queriesdata'));
  }
  
  
    public function queries_destroy($id)
  {
    $queriesdata=InsContactusModel::find($id);
    $queriesdata->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }
}