<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationModel;
use App\Models\InstituteModel;
use DB;
use PDF;

class AdminapplicationController extends Controller
{

    public function __construct()
{
    $this->middleware('admin');
}

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function offlineapplications()
  {
      $offline=ApplicationModel::where('mode_of_pay',1)->orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.offlineapplications.index',compact('title','offline'));
  }
  
   public function onlineapplications()
  {
      $online=ApplicationModel::where('mode_of_pay',2)->orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.onlineapplications.index',compact('title','online'));
  }
  
   public function pendingapplications()
  {
      $pending=ApplicationModel::where('mode_of_pay',0)->orderby('id','desc')->paginate(25);
      $title = 'All Listings';
      return view('admin.pendingapplications.index',compact('title','pending'));
  }
  
  
  public function display_offlineapplications($id)
    {
       
        $listing = ApplicationModel::find($id);
          $institute=InstituteModel::where('id',$listing->ins_id)->first();
    	$title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.offlineapplications.display',compact('listing','title','institute'));
    }
    
    
     public function display_onlineapplications($id)
    {
       
        $listing = ApplicationModel::find($id);
          $institute=InstituteModel::where('id',$listing->ins_id)->first();
    	$title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.onlineapplications.display',compact('listing','title','institute'));
    }


 public function display_pendingapplications($id)
    {
       
        $listing = ApplicationModel::find($id);
          $institute=InstituteModel::where('id',$listing->ins_id)->first();
    	$title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.pendingapplications.display',compact('listing','title','institute'));
    }
    

public function onlineapp_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('onlineapplications');
  }
$query = ApplicationModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',2);
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',2);
          }
          
          else if($_GET['type']==3)
          {
            $query= $query->Where('f_phone', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',2);
            
          }
            else 
          {
            $query= $query->Where('application_no', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',2);
            
          }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $online=$query->paginate(25);
          $online=$online->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
   {
    
      return Excel::download(new Advanceleadexport, 'invoices.xlsx');
  }
          return view('admin.onlineapplications.index',compact('online','title','keyword','type'));
}



public function offlineapp_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('offlineapplications');
  }
$query = ApplicationModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',1);
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',1);
          }
          
          else if($_GET['type']==3)
          {
            $query= $query->Where('f_phone', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',1);
            
          }
            else 
          {
            $query= $query->Where('application_no', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',1);
            
          }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $offline=$query->paginate(25);
          $offline=$offline->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
   {
    
      return Excel::download(new Advanceleadexport, 'invoices.xlsx');
  }
          return view('admin.offlineapplications.index',compact('offline','title','keyword','type'));
}



public function pendingapp_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('pendingapplications');
  }
$query = ApplicationModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('name', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',0);
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('email', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',0);
          }
          
          else if($_GET['type']==3)
          {
            $query= $query->Where('f_phone', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',0);
            
          }
            else 
          {
            $query= $query->Where('application_no', 'like', '%' . trim($_GET['keyword']). '%')->where('mode_of_pay',0);
            
          }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $pending=$query->paginate(25);
          $pending=$pending->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
   {
    
      return Excel::download(new Advanceleadexport, 'invoices.xlsx');
  }
          return view('admin.pendingapplications.index',compact('pending','title','keyword','type'));
}


public function admission_pdf1($id)
{

   $data= ApplicationModel::find($id);
 //  echo"sdD";exit();
   
       $institute=InstituteModel::where('id',$data->ins_id)->first();
     $pdf = PDF::loadView('PDF.admission', compact('data','institute'));
      $inv="1.pdf";
         //  Storage::put('public/images/'.1.'.pdf', $pdf->output());
            return $pdf->stream('Invoice.pdf');
      //return $pdf->download('Admission.pdf');
}


public function onlineapp_destroy($id)
  {
    $listing=ApplicationModel::find($id);
    $listing->delete();
    $alert = ['success','Deleted successfully'];
    return redirect('onlineapplications')->with('status', 'Send successfully.');
// return back()->with('status', 'Send successfully.'); 

    //return back()->withAlert($alert);   
  }
  
  public function offlineapp_destroy($id)
  {
    $listing=ApplicationModel::find($id);
    $listing->delete();
    $alert = ['success','Deleted successfully'];
    return redirect('offlineapplications')->with('status', 'Send successfully.');
// return back()->with('status', 'Send successfully.'); 

    //return back()->withAlert($alert);   
  }
  
   public function pendingapp_destroy($id)
  {
    $listing=ApplicationModel::find($id);
    $listing->delete();
    $alert = ['success','Deleted successfully'];
    return redirect('pendingapplications')->with('status', 'Send successfully.');
// return back()->with('status', 'Send successfully.'); 

    //return back()->withAlert($alert);   
  }




}

