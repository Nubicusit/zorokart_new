<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogsreplyModel;
use Illuminate\Support\Facades\Session;



use DB;

class BlogsreplyController extends Controller
{

  public function blogsreply()
  {
    
      $blogsreplydata=BlogsreplyModel::get();
      $title = 'All Listings';
    //   echo"hi";
    //   exit();
      return view('admin.blogsreply.index',compact('title','blogsreplydata'));
  }
    
  

  public function blogsreply_destroy($id)
  {
    $blogsreply=BlogsreplyModel::find($id);
    $blogsreply->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }

  
 




}