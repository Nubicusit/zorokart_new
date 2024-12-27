<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationModel;
use App\Models\InstituteModel;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;

class ApplicationController extends Controller
{

    public function __construct() {
    //   $this->middleware('auth');
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function pay_offline($app_id)
   {
       $app= ApplicationModel::find($app_id);
       $ins_id=$app->ins_id;
       $institution=InstituteModel::find($ins_id);
    $app= ApplicationModel::find($app_id);
  //  print_r($app);die;
    $app->mode_of_pay=1;
    $app->save();
    if($institution->type=="s")
    {
        $class= $app->s_class." class ";
    }
    else
    {
        $class= $app->s_class." course ";
    }
        return view('client.pay_offline',compact('app_id','institution','app','class'));
echo"offline payment success";
   }
   
  public function application_preview(Request $request)
  {
  $id=$request->ins_id;
// exit();
 $apptemp=DB::table('institute')->where('id',  $id)->first();
 $cat=$apptemp->type;
// foreach($apptemp as $a)
// {
//     if($a->photo)
//     {
//       unlink('public/images/apptemp/' . $a->photo);
//     }
// }
//   //exit();
    if($request->file('photo'))
      {
          $file= $request->file('photo');
          $filename= date('YmdHi').$file->getClientOriginalName();
          $file->move(('public/images/apptemp'),$filename);

      }
     else
     {
          $filename= "upload-pic.png";
     }
   
   
    $ins_id = $request->ins_id;
        $ApplicationMode=new ApplicationModel();
        $ApplicationMode->user_id=Auth::guard('parent')->user()->id;
        $ApplicationMode->photo=$filename;
        $ApplicationMode->status=0;
        $ApplicationMode->name=$request->name;
        $ApplicationMode->email=$request->email;
        $ApplicationMode->dob=$request->dob;
        $ApplicationMode->gender=$request->gender;
        $ApplicationMode->s_class=$request->s_class;
        $ApplicationMode->religion=$request->religion;
        $ApplicationMode->cast=$request->cast;
        $ApplicationMode->category=$request->category;
        $ApplicationMode-> f_name=$request->f_name;
        $ApplicationMode->f_phone=$request->f_phone;
        $ApplicationMode->f_qualification=$request->f_qualification;
        $ApplicationMode->f_occupation=$request->f_occupation;
        $ApplicationMode->f_income=$request->f_income;
        $ApplicationMode->m_name=$request->m_name;
        $ApplicationMode->m_phone=$request->m_phone;
        $ApplicationMode->m_qualification=$request->m_qualification;
        $ApplicationMode-> m_occupation=$request->m_occupation;
        $ApplicationMode-> m_income=$request->m_income;
        $ApplicationMode->adhaar=$request->adhaar;
        $ApplicationMode->disability=$request->disability;
        $ApplicationMode->s_condition=$request->s_condition;
        $ApplicationMode->address=$request->address;
        $ApplicationMode->district=$request->district;
        $ApplicationMode->state=$request->state;
        $ApplicationMode->pincode=$request->pincode;
        $ApplicationMode->permanent_add=$request->permanent_add;
        $ApplicationMode->cor_address=$request->cor_address;
        $ApplicationMode->cor_district=$request->cor_district;
        $ApplicationMode->cor_state=$request->cor_state;
        $ApplicationMode->cor_pincode=$request->cor_pincode;
        $ApplicationMode->ins_id=$ins_id;
        $ApplicationMode->status=0;
        $ApplicationMode->application_no=0;
        $application = $ApplicationMode->save();
        $app_id=$ApplicationMode->id;
        $data=ApplicationModel::find($app_id);
        

        $alert = ['success','Added successfully'];
     return view('client.form_details',compact('data','id','app_id','cat'));
  }

public function application_edit($id)
  {
//  echo $id;
//  die;
$data=DB::table('application')->where('id',$id)->first();

     return view('client.edit_form_details',compact('data'));
  }


  public function application_store(Request $request)
  {
        $ins_id = $request->ins_id;
        $app_id=$request->app_id;
        $centreaddarray = array(
        'status'=>0,
         'application_no'=>"AL".date('ydm').$app_id
        );
        $app_id=$request->app_id;
        $application=ApplicationModel::find($app_id);
         $app = ApplicationModel::where('id',$app_id)->update($centreaddarray);
          $institute =  InstituteModel::find($ins_id);
        $alert = ['success','Added successfully'];
        return view('client.payment',compact('app_id','institute','application'));



}


public function update_application(Request $request)
{
     $id=$request->ins_id;
      $app_id=$request->app_id;
// exit();
 $apptemp=DB::table('institute')->where('id',  $id)->first();
 $cat=$apptemp->type;
  $ApplicationMode= ApplicationModel::find($app_id);
  $photo=$ApplicationMode->photo;
    if($request->file('photo'))
      {
          $file= $request->file('photo');
          $filename= date('YmdHi').$file->getClientOriginalName();
          $file->move(('public/images/apptemp'),$filename);

      }
     else
     {
          $filename= $photo;
     }
   
   
    $ins_id = $request->ins_id;
        $ApplicationMode->user_id=Auth::guard('parent')->user()->id;
        $ApplicationMode->photo=$filename;
        $ApplicationMode->status=0;
        $ApplicationMode->name=$request->name;
        $ApplicationMode->email=$request->email;
        $ApplicationMode->dob=$request->dob;
        $ApplicationMode->gender=$request->gender;
        $ApplicationMode->s_class=$request->s_class;
        $ApplicationMode->religion=$request->religion;
        $ApplicationMode->cast=$request->cast;
        $ApplicationMode->category=$request->category;
        $ApplicationMode-> f_name=$request->f_name;
        $ApplicationMode->f_phone=$request->f_phone;
        $ApplicationMode->f_qualification=$request->f_qualification;
        $ApplicationMode->f_occupation=$request->f_occupation;
        $ApplicationMode->f_income=$request->f_income;
        $ApplicationMode->m_name=$request->m_name;
        $ApplicationMode->m_phone=$request->m_phone;
        $ApplicationMode->m_qualification=$request->m_qualification;
        $ApplicationMode-> m_occupation=$request->m_occupation;
        $ApplicationMode-> m_income=$request->m_income;
        $ApplicationMode->adhaar=$request->adhaar;
        $ApplicationMode->disability=$request->disability;
        $ApplicationMode->s_condition=$request->s_condition;
        $ApplicationMode->address=$request->address;
        $ApplicationMode->district=$request->district;
        $ApplicationMode->state=$request->state;
        $ApplicationMode->pincode=$request->pincode;
        $ApplicationMode->permanent_add=$request->permanent_add;
        $ApplicationMode->cor_address=$request->cor_address;
        $ApplicationMode->cor_district=$request->cor_district;
        $ApplicationMode->cor_state=$request->cor_state;
        $ApplicationMode->cor_pincode=$request->cor_pincode;
        $ApplicationMode->ins_id=$ins_id;
        $ApplicationMode->status=0;
        $ApplicationMode->application_no=0;
        $application = $ApplicationMode->save();
        $app_id=$ApplicationMode->id;
        $data=ApplicationModel::find($app_id);
        

        $alert = ['success','Added successfully'];
     return view('client.form_details',compact('data','id','app_id','cat'));
}


public function admission_pdf_data($id)
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


}
