<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Session;



use DB;

class ContactController extends Controller
{
    
 
    
   public function contactdata_store(Request $request)
  {
    //   echo "hi";
    //   exit();
      
      
  $centreaddarray = array(
      'name'=>$request->name,
      'about'=>$request->about,
      'phone'=>$request->phone,
      'reason'=>$request->reason,
      'email'=>$request->email,
      'message'=>$request->message,
      'location'=>$request->location,
      
  );
   $contactdata= ContactModel::create($centreaddarray);
//   $alert = ['success','Message sent successfully, we will get back to you shortly'];
      return redirect()->back()->with('status','Message sent successfully, we will get back to you shortly');
    //  return back()->withAlert($alert);
  }
  
  
  public function display_contactdata($id)
    {
       
        $listing = ContactModel::find($id);
    	$title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.contact.display',compact('listing','title'));
    }
    
    
    public function contact_destroy($id)
  {
    $contactdata=ContactModel::find($id);
    $contactdata->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }


}