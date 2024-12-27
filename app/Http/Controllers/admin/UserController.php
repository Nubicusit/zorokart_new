<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Userexport;


class UserController extends Controller
{
  public function __construct()
{
    $this->middleware('admin');
}



 public function user_action(Request $request, $id)
    {
        $listing = User::find($id);
    	  $title = 'All Listings';
          $listing->status=trim($request->status);
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }


public function user_search()
{
  if(isset($_GET['submit']))
  {
    return redirect('schoolpeusers');
  }
          $users=AdminModel::query();
          if($_GET['type']==1)
          {
           
            $users= $users->Where('name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $users= $users->Where('phone', 'like', '%' . $_GET['keyword'] . '%');
          }
          else
          {
            $users= $users->Where('email', 'like', '%' . $_GET['keyword'] . '%');
            
          }
         
          $schoolpeusers=$users->paginate(500);
          $schoolpeusers=$schoolpeusers->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
          return view('admin.schoolpeusers.index',compact('schoolpeusers','title'));
}
   

 public function adduser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
         ]);

             $centreaddarray = array(
            'user_name'=>$request->name,
            'email'=>$request->email,
            'user_phone'=>$request->user_phone,
            'first_name'=>1,
            'last_name'=>1,
            'user_address'=>1,
            'image'=>1,
            'password'=>1,
            'role'=>1,
           
       );
         $users = User::create($centreaddarray);
         $alert = ['success','Added successfully'];
           return back()->withAlert($alert);

    }


    public function edit($id)
    {
         $users = User::find($id);
         return view('admin.user.index', compact('users'));
    }


    public function userupdate(Request $request,User $users)
    {
      //  print_r($_POST);die;
        // echo"hi";
        // exit();
        
       
         $id=$_POST['id'];
         
        // $id = $_POST['id'];
        
      $users=User::find($id);
      
      $users->name=$_POST['name'];
      $users->phone=$request->phone;
      $users->email=$request->email;
      $users->save();

       $alert = ['success','Updated successfully'];
       return back()->withAlert($alert);
     
    }

    public function userdestroy(User $users, $id)
    {
     //echo"hi";exit();
      $users=User::find($id);
      $users->delete();

    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
    }   
    

   public function schoolpeusers()
    {
      $schoolpeusers=Auth::guard('admin')->user();
     
        $schoolpeusers=AdminModel::paginate(25);
    
        $title = 'All Listings';
        return view('admin.schoolpeusers.index',compact('title','schoolpeusers'));
    }
     
    

    public function addschoolpe_user(Request $request)
    {

             $centreaddarray = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
       );
         $schoolpeuser = AdminModel::create($centreaddarray);
         $alert = ['success','Added successfully'];
           return back()->withAlert($alert);

    }

    public function schoolpeusers_destroy($id)
    {
      $schoolpeuser=AdminModel::find($id);
      $schoolpeuser->delete();

    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
    } 
    
    public function schoolpseupdate_user(Request $request)
    {
       
       $id=$_POST['id'];
       $schoolpeuser=AdminModel::find($id);
       $pass=$schoolpeuser->password;
       if(!empty($_POST['password']))
       {
           //echo"hi";exit();
           $pass=bcrypt($request->post('password'));
       }
          $schoolpeuser->name = $request->post('name');
        //   $user->last_name  = 1;
          $schoolpeuser->email = $request->post('email');
          $schoolpeuser->phone = $request->post('phone');
          $schoolpeuser->role = $request->post('role');
          $schoolpeuser->password = $pass;
        
     //  echo"hi";exit();
         $user1 =  $schoolpeuser->save();  

//
 return back()->with('status', 'Updated successfully.'); 
 
     
        
     }
     
     
      public function userstatus(Request $request)
    {
      $users = User::find($request->id);
      $users->status = $request->status;
      $users->save();
    }

public function password()
  {
       $users=Auth::guard('admin')->user();
    return view('admin.password.edit',compact('users'));
  }
  
  
  public function admin_change_password()
{
    
   $pass=bcrypt($_POST['password1']);
  //print_r(bcrypt($_POST['password']));
  //die;
 
  $id=Auth::guard('admin')->id();
  $users=DB::table('admin')->where('id',$id)->update(array('password'=>$pass));
  //print_r($user);
 // return back()->with('success', 'Password Changed Successfully!');
  
  return redirect("institute")->withSuccess('Password changed successfully, please login again');
  

}


 public function user_profile()
 {
     $users=Auth::guard('admin')->user();
     return view('admin.profile.index',compact('users'));
 }
 
  public function admin_profile_update()
{
    
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
  //print_r(bcrypt($_POST['password']));
  //die;
 
  $id=Auth::guard('admin')->id();
  $users=DB::table('admin')->where('id',$id)->update(array('name'=>$name,'email'=>$email,'phone'=>$phone));
  //print_r($user);
  return back()->with('success', 'Profile Updated Successfully!');
  
//  return redirect("institute")->withSuccess('Password changed successfully, please login again');
  

}

public function userdata_search()
{
  if(isset($_GET['submit']))
  {
    return redirect('user');
  }
          $users=User::query();
         $users=$users->where('email_verified',0);
          if($_GET['type']==1)
          {
           
            $users= $users->Where('user_name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $users= $users->Where('user_phone', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==3)
          {
            $users= $users->Where('email', 'like', '%' . $_GET['keyword'] . '%');
            
          }
          else if ($_GET['type'] == 4) 
      {
      
        $users = $users->where('status',1);
      }
      else if ($_GET['type'] == 5) 
      {
        $users = $users->where('status','C');
      }
      else if ($_GET['type'] == 6) 
      {
        $users = $users->where('status','F');
      }
      else if ($_GET['type'] == 7) 
      {
        $users = $users->where('status','D');
      }
          
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
          $users=$users->paginate(2000);
          $users=$users->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
          if(isset($_GET['export']))
  
    {
    
  return Excel::download(new Userexport, 'Users.xlsx');
  }
          return view('admin.user.index',compact('users','title','keyword','type'));
}
   

    
}
