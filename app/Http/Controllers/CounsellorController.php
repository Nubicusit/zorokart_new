<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounsellorModel;
use App\Models\ParentRegistrationModel;
use Illuminate\Support\Facades\Session;



use DB;

class CounsellorController extends Controller
{

  public function counsellor()
  {
    
      $counsellordata=CounsellorModel::get();
      $title = 'All Listings';
      return view('admin.counsellor.index',compact('title','counsellordata'));
  }
    
 
 


//   public function display_customer($id)
//     {
       
//         $listing = ParentRegistrationModel::find($id);
//     	  $title = 'All Listings';
//       // print_r( $listing );exit();
//     	return view('admin.customer.display',compact('listing','title'));
//     }



}