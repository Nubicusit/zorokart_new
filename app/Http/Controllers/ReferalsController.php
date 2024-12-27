<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReferalsModel;
use Illuminate\Support\Facades\Session;



use DB;

class ReferalsController extends Controller
{

  public function referals()
  {
    
      $referalsdata=ReferalsModel::get();
      $title = 'All Listings';
      return view('admin.referals.index',compact('title','referalsdata'));
  }
    
 
  public function referals_destroy($id)
  {
    $referals=ReferalsModel::find($id);
    $referals->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }

  
 




}