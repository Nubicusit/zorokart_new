<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Unit;
use App\Models\UserparentModel;
use App\Models\InstituteModel;
use App\Models\ParentRegistrationModel;
use Illuminate\Support\Facades\Session;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\ApplicationModel;
use PDF;
use DB;
use Storage;
class ParentController extends Controller
{
public function admission_pdf_parent($id)
{
   $data= ApplicationModel::find($id);
   //echo"sdD";exit();
   
       $institute=InstituteModel::where('id',$data->ins_id)->first();
     $pdf = PDF::loadView('PDF.admission', compact('data','institute'));
      $inv="1.pdf";
         //  Storage::put('public/images/'.1.'.pdf', $pdf->output());
            return $pdf->stream('Invoice.pdf');
      //return $pdf->download('Admission.pdf');
}
  public function redirect()
  {
      Socialite::driver('google')->redirect();
  }
    public function parent_first_update()
   {
       $id=$id=Auth::guard('parent')->user()->id;
       $userparent=UserparentModel::find($id);
       $userparent->name=$_POST['name'];
       $userparent->email=$_POST['email'];
       $userparent->phone=$_POST['phone'];
       $userparent->save();
       Session::flash('message', 'Updated successfully!'); 
       return back()->withAlert("success");
   }
   public function parentdata_store(Request $request)
  {
      
     
         if($request->file('profile_pic'))
         {
          $file = $request->file('profile_pic');
          $filename = date('YmdHi') . $file->getClientOriginalName();
    
           $file->move(('public/images/parant'), $filename);
           $id=$id=Auth::guard('parent')->user()->id;
           $userparent=UserparentModel::find($id);
           $userparent->image=$filename;
           $userparent->save();
     
         }
    
  
  
   $parentdata= ParentRegistrationModel::where('user_id',Auth::guard('parent')->user()->id)->first();
   if($parentdata)
   {
      
      $parentdata->fname=$request->fname;
      $parentdata->mname=$request->mname;
      $parentdata->address=$request->address;
      $parentdata->city=$request->city;
      $parentdata->state=$request->state;
      $parentdata->pincode=$request->pincode;
      $parentdata->user_id=Auth::guard('parent')->user()->id;
      $parentdata->save();
   }
   else
   {
      $parentdata= new ParentRegistrationModel();
       $parentdata->fname=$request->fname;
      $parentdata->mname=$request->mname;
      $parentdata->address=$request->address;
      $parentdata->city=$request->city;
      $parentdata->state=$request->state;
      $parentdata->pincode=$request->pincode;
       $parentdata->status=1;
      $parentdata->user_id=Auth::guard('parent')->user()->id;
      $parentdata->save();
   }
  Session::flash('message1', 'Updated successfully!'); 
    return back()->withAlert("success");
  }


  public function display_customer($id)
    {
        // echo "hi";
        // exit();
        
            $listing = ParentRegistrationModel::find($id);
      $data=UserParentModel::where('id',$listing->user_id)->first();
        
        
        
       //   $institutereg = InstituteModel::Leftjoin('users', 'institute.user_id', '=', 'users.id') ->get();
       
        $listing = ParentRegistrationModel::find($id);
    	  $title = 'All Listings';
      // print_r( $listing );exit();
    	return view('admin.leads.display',compact('listing','title','data'));
    }

    public function parent_login(Request $request)
    {
      //print_r($_POST);exit();
    //  echo"hi";exit();
   try
   {
      // echo"reached";exit();
        Socialite::driver('google')->redirect();
       $google_use=Socialite::driver('google')->user();
       $user=User::where('google_id',$google_use->getId())->first();
                  $request->validate([
                    'email' => 'required',
                   
                ]);
                $credentials = $request->only('email', 'password');
            
                // print_r( $credentials);
                // exit();
                  
                if (Auth::attempt($credentials)) {
                 // die;
                  $user = auth()->user(); 
                  if($user->role==2)
                  {
                    return redirect('my_profile') ;
                
                  }
                  return redirect()->back()->with('status','Invalid login credicials');
                }
                return redirect()->back()->with('status','Invalid login credicials');
  }
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

}


    public function application_submitted()
    {
        $id=$id=Auth::guard('parent')->user()->id;
        $application=ApplicationModel::where('user_id',$id)->orderBy('id','desc')->get();
       // print_r($application);exit();
        $institute=InstituteModel::where('action',1)->get();
        return view('client.parent_application',compact('application','institute'));
    }
    
    public function application_submitted_done()
    {
        $id=$id=Auth::guard('parent')->user()->id;
        $application=ApplicationModel::where('user_id',$id)->where('status',1)->orderBy('id','desc')->get();
       // print_r($application);exit();
        $institute=InstituteModel::where('action',1)->get();
        return view('client.parent_application',compact('application','institute'));
    }
    public function updatepassword(Request $request)
{
    // echo"hi";
    // exit();
    //$pass1 = $request->post('password1');
    $password2  = $request->post('password2');
    $id=$id=Auth::guard('parent')->user()->id;
     $updatearray = array(
    
            'password' =>   bcrypt($password2) 
            );
            // $encrypted_pass =$this->encryptIt($request->password);
             $data = UserparentModel::where('id', $id)->update($updatearray);  
// exit();
//return back()->withAlert('status','Added Successfully!');
        return redirect('/')->with('status','Password Updated Successfully!');
}

}