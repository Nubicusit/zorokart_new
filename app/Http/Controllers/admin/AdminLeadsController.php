<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReferalsModel;
use App\Models\ParentRegistrationModel;
use App\Models\UsercontactModel;
use App\Models\MessageModel;
use App\Models\CounsellorModel;
use App\Models\BlogsreplyModel;
use App\Models\ContactModel;
use App\Models\UserparentModel;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Freshleadexport;
use App\Models\Advancelead;
use App\Exports\Counsellorexport;
use App\Exports\Messageexport;
use App\Exports\Referalsexport;
use App\Exports\Blogsreplyexport;
use App\Exports\Contactusexport;
use App\Exports\Advanceleadexport;


class AdminLeadsController extends Controller
{
  public function referals()
  {
     $type="";
     $keyword="";
      $referalsdata=ReferalsModel::orderby('id','desc')->paginate(25);
      
      $title = 'All Listings';
      return view('admin.referals.index',compact('title','referalsdata','type','keyword'));
  }
  public function  counsellor_action(Request $request, $id)
    {
        $listing = CounsellorModel::find($id);
    	  $title = 'All Listings';
          $listing->leadstatus=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
  public function referals_destroy($id)
  {
    $referals=ReferalsModel::find($id);
    $referals->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }
    public function display_customer($id)
    {
        // echo"hi";
        // exit();
       
    //     $listing = ParentRegistrationModel::find($id);
    //   $data=UserparentModel::where('id',$listing->user_id)->first();
       
      $listing =  UserparentModel::find($id);
      $data1=ParentRegistrationModel::get();
    	  $title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.leads.display',compact('listing','title','data1'));
    }   
    public function freshlead_action(Request $request, $id)
    {
        $listing = UserparentModel::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
   
  //Usercontact
      public function usercontact()
  {
    
      $usercontact=UsercontactModel::get();
      $title = 'All Listings';
      return view('admin.usercontact.index',compact('title','usercontact'));
  }
   
    
    public function usercontact_destroy($id)
  {
    $usercontact=UsercontactModel::find($id);
    $usercontact->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
  }  
  
 public function message()
  {
    // echo"hi";
    // exit();
   $_GET['cat']="";
    $type="";
    $keyword="";
      $message=Messagemodel::orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.message.index',compact('title','message','type','keyword'));
  }
  
  public function message_destroy($id)
  {
    $message=Messagemodel::find($id);
    $message->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);
  }
  
   public function freshlead_export()
  {
          $data = UserparentModel::join('parent_registration', 'parent_registration.user_id', '=', 'user_parents.id')->get();
  return Excel::download(new Freshleadexport, 'invoices.xlsx', compact('data'));
  }
  public function customer()
  {
    // echo "hi";
    // exit();
     $data = UserparentModel::orderby('id','desc')->paginate(25);
     
     //$data = UserparentModel::join('parent_registration', 'parent_registration.user_id', '=', 'user_parents.id')->paginate(10);
    
    	  $title = 'All Listings';
    
    
  $keyword="";
  $type="";
      return view('admin.leads.index',compact('title','data','keyword','type'));
  }
  
  public function counsellor()
  {
    $type="";
    $keyword="";
      $counsellordata=CounsellorModel::orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.counsellor.index',compact('title','counsellordata','type','keyword'));
  }
  
   public function blogsreply()
  {
      $type="";
      $keyword="";
      $blogsreplydata=BlogsreplyModel::orderby('id','desc')->paginate(25);
      $title = 'All Listings';
    //   echo"hi";
    //   exit();
      return view('admin.blogsreply.index',compact('title','blogsreplydata','type','keyword'));
  }
  
      public function contactus()
  {
      $type="";
      $keyword="";
      $contactusdata=ContactModel::orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.contact.index',compact('title','contactusdata','type','keyword'));
  }
  // public function 
    
     public function user()
    {
        $keyword="";
        $users = User::where('email_verified',0)->orderby('id','desc')->paginate(25);
        $title = 'All Listings';
        $type="";
       return view('admin.user.index',compact('users','title','keyword','type'));
        
    }
    
    
     public function advanceleads()
  {
    $type="";
    $keyword="";
      $advanceleads=Advancelead::orderby('id','desc')->paginate(25);
      
      $title = 'All Listings';
      return view('admin.advanceleads.index',compact('title','advanceleads','type','keyword'));
  }
  
//   public function advancelead_update(Request $request)
//   {
    
//       $id=$_POST['id'];
//       $prop=Advancelead::find($id);
 

//   $prop->name = $request->input('name');
//   $prop->email = $request->input('email');
//   $prop->phone = $request->input('phone');
  
//   $prop->save();
//       $alert = ['success','Updated successfully'];
//      return back()->withAlert($alert);
//   }
  
   public function advancelead_destroy($id)
  {
    $advanceleads=Advancelead::find($id);
    $advanceleads->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);
  }

public function lead_search()
{
  if(isset($_GET['reset']))
  {
    return redirect('customer');
  }
$query = UserparentModel::query();
//$query = $query->join('parent_registration', 'parent_registration.user_id', '=', 'user_parents.id');
          
          if($_GET['type']==1)
          {
          
            $query= $query->Where('name', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==2)
          {
            $query= $query->Where('email', 'like', '%' . $_GET['keyword'] . '%');
          }
          else if($_GET['type']==3)
          {
            $query= $query->Where('phone', 'like', '%' . $_GET['keyword'] . '%');
            
          }
           else if ($_GET['type'] == 4) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
         $user=$query->get();
          $data=$query->paginate(25);
          $data=$data->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Freshleadexport, 'FreshLeads.xlsx');
  }
          return view('admin.leads.index',compact('data','title','keyword','type'));
}


public function message_search()
{

  if(isset($_GET['reset']))
  {
    return redirect('message');
  }
$query = Messagemodel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%');
          }
          else if($_GET['type']==3)
          {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
       else if ($_GET['type'] == 4) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','D');
      }
      
      
          $keyword = $_GET['keyword'];
          $type = $_GET['type'];
        
          $message=$query->paginate(25);
          $message=$message->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
           
             
  {
    
  return Excel::download(new Messageexport, 'MessageLeads.xlsx');
  }
          return view('admin.message.index',compact('message','title','keyword','type'));
}
  
  public function message_action(Request $request, $id)
    {
        $listing = Messagemodel::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
    
    public function counsellor_search()
{
  if(isset($_GET['reset']))
  {
    return redirect('counsellor');
  }
$query = CounsellorModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          
          else if($_GET['type']==2)
          {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
          else if ($_GET['type'] == 3) 
       {
      
        $query = $query->where('leadstatus','N');
       }
      else if ($_GET['type'] == 4) 
       {
        $query = $query->where('leadstatus','C');
      }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('leadstatus','F');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('leadstatus','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $counsellordata=$query->paginate(25);
          $counsellordata=$counsellordata->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Counsellorexport, 'CounsellorLeads.xlsx');
  }
          return view('admin.counsellor.index',compact('counsellordata','title','keyword','type'));
}

 public function referals_action(Request $request, $id)
    {
        // echo"jj";
        // exit();
        $listing = ReferalsModel::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
    
    
  
  
 public function referals_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('referals');
  }
$query = ReferalsModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          
          else if($_GET['type']==2)
          {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
           else if ($_GET['type'] == 3) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 4) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $referalsdata=$query->paginate(25);
          $referalsdata=$referalsdata->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Referalsexport, 'ReferalsLeads.xlsx');
  }
          return view('admin.referals.index',compact('referalsdata','title','keyword','type'));
}


public function blogsreply_action(Request $request, $id)
    {
        // echo"jj";
        // exit();
        $listing = BlogsreplyModel::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }



public function blogsreply_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('blogsreply');
  }
$query = BlogsreplyModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          
          else  if($_GET['type']==2)
          {
            $query= $query->Where('mail', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
           else if ($_GET['type'] == 3) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 4) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $blogsreplydata=$query->paginate(25);
          $blogsreplydata=$blogsreplydata->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Blogsreplyexport, 'BlogsReplyLeads.xlsx');
  }
          return view('admin.blogsreply.index',compact('blogsreplydata','title','keyword','type'));
}

public function contactus_action(Request $request, $id)
    {
        // echo"jj";
        // exit();
        $listing = ContactModel::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
    
    
    public function contactus_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('contactus');
  }
$query = ContactModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
           else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%');
          }
            else if($_GET['type']==3)
          {
                
            $query= $query->Where('location', 'like', '%' . trim($_GET['keyword']). '%');
          }
          
         else if($_GET['type']==4)
          {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
           else if ($_GET['type'] == 5) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 8) 
       {
        $query = $query->where('status','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $contactusdata=$query->paginate(25);
          $contactusdata=$contactusdata->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Contactusexport, 'ContactUsLeads.xlsx');
  }
          return view('admin.contact.index',compact('contactusdata','title','keyword','type'));
}


public function lead_action(Request $request, $id)
    {
        // echo"jj";
        // exit();
        $listing = Advancelead::find($id);
    	  $title = 'All Listings';
          $listing->status=$request->status;
          $listing->remarks=$request->remarks;
          $listing=$listing->save();
          if($listing)
          {
            return back()->with('status','Action updated successfully');
          }
          return back()->with('status','Action not updated please try again');
       
    }
    
    
    public function advancelead_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('advanceleads');
  }
$query = Advancelead::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%');
          }
          
          else if($_GET['type']==3)
          {
            $query= $query->Where('phone', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
          
            else if ($_GET['type'] == 4) 
       {
      
        $query = $query->where('status','N');
       }
      else if ($_GET['type'] == 5) 
       {
        $query = $query->where('status','C');
      }
      else if ($_GET['type'] == 6) 
       {
        $query = $query->where('status','F');
      }
      else if ($_GET['type'] == 7) 
       {
        $query = $query->where('status','D');
      }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $advanceleads=$query->paginate(25);
          $advanceleads=$advanceleads->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
  {
    
  return Excel::download(new Advanceleadexport, 'AdvanceLeads.xlsx');
  }
          return view('admin.advanceleads.index',compact('advanceleads','title','keyword','type'));
}

    
}
