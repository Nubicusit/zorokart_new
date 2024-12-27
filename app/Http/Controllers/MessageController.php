<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageModel;
use DB;

class MessageController extends Controller
{

//     public function __construct()
// {
//     $this->middleware('auth');
// }

//COURSES

//   public function message()
//   {
    
//       $message=MessageController::get();
//       $title = 'All Listings';
//       return view('admin.courses.index',compact('title','courses'));
//   }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  




  
  public function message_store(Request $request)
  {
    //   echo "hi";
    //   exit();
  $centreaddarray = array(
      'type'=>$request->type,
      'institute'=>$request->institute,
      'name'=>$request->name,
      'phone'=>$request->phone,
      'email'=>$request->email,
      'message'=>$request->message,
      
  );
   $message = Messagemodel::create($centreaddarray);

  if($message){
    // return back()->with('status','Message sent successfully. We will get back to you shortly');
    return redirect()->back()->with('status', 'Message sent successfully. We will get back to you shortly');  
}
else{
     return back()->with('errstatus','Failed To Send Message');
}

    // $alert = ['status','Message Sent Successfully'];
    //  return back()->withAlert($alert);
  
  }
}