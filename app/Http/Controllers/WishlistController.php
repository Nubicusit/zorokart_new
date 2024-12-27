<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\CollegeCoursesModel;
use Illuminate\Http\Request;
use App\Models\InstituteModel;
use App\Models\CollegeModel;
use App\Models\WishlistModel;

class WishlistController extends Controller
{

  public function wishlist()
    {
         if (Auth::guard('parent')->check()) {
     $id=Auth::guard('parent')->user()->id;
      $institute=InstituteModel::join('wish_list', 'wish_list.ins_id', '=', 'institute.id')
      ->select('*','institute.id as id','wish_list.id as id1')
      ->where('wish_list.user_id',$id)->get();
    
      $result_count = sizeof($institute) ;
            $queryString = " ";
             $institution_type =" ";
        $course_offered = CollegeCoursesModel::get();
       return view('client.wishlist', array('course_offered'=>$course_offered,'institute' => $institute, 
        'queryString' => $queryString, 'result_count' => $result_count, 'institution_type' => $institution_type));
         }
         else
         {
             return back()->with('status', 'Please Login');  
         }
    }
    public function get_wishlist()
    {
  $status_action=$_POST['status'];
    
         if (Auth::guard('parent')->check()) {

          if($status_action==2)
          {
              $wishlist=WishlistModel::where('ins_id',$_POST['id'])->where('user_id',Auth::guard('parent')->user()->id)->first();
              if($wishlist)
              {
                  //nothing to do
              }
              else
              {
                    WishlistModel::create([
                  
                        'ins_id' =>$_POST['id'],
                        'user_id' =>Auth::guard('parent')->user()->id
                       
                     
                    ]);
              }
            
          }
          else
          {
              $wishlist=WishlistModel::where('ins_id',$_POST['id'])->where('user_id',Auth::guard('parent')->user()->id)->first();
              if($wishlist)
              {
                  $wishlist->delete();
              }
             
          }
          $status=1;
        }
        else
        {
          $status=2;
        }
       
        echo json_encode($status);   
    
       
}

public function remove_wishlist($id)
{
   
    $wishlist_delete = WishlistModel::find($id);
    $wishlist_delete ->delete();
    $alert = ['success', 'Deleted successfully'];
    return back()->withAlert($alert);
}



}