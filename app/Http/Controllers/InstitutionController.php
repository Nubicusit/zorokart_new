<?php

namespace App\Http\Controllers;
use App\Models\CollegeModel;
use Illuminate\Http\Request;
use Hash;
use  \Illuminate\Support\Facades\Session;
use App\Models\PropertyRequest;
use App\Models\InstituteModel;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use HTMLPurifier;
use App\Models\UserparentModel;
use App\Models\User;
use App\Models\Courses;
use App\Models\Streams;
use App\Models\CollegeCoursesModel;
use Mail;
use App\Mail\ForgotEmail\Schoolspe;
use DB;

class InstitutionController extends Controller
{
  public function get_videoRemove()
  {

    $id = $_POST['catlogid'];
    $i = $_POST['pos'];
    $institute = InstituteModel::where('id', $id)->first();
    $cat_img = $institute->videos;
    // print_r($cat_img);
    $cat = array();
    $count = count($cat_img);
    if (!empty($cat_img)) {



      if (!empty($cat_img[$i])) {

        unlink('public/images/' . $cat_img[$i]);
        unset($cat_img[$i]);

        $count = count($cat_img);
        $i = 0;
        foreach ($cat_img as $x => $val) {
          //    echo"hixcxc";exit();
          //   exit();

          $cat[$i] = $val;
          $i++;
        }


        //  print_r($cat);exit();
        $institute->videos = $cat;
        $institute->save();
      }
    }
  }
  public function get_premium(Request $request)
  {
    $institute = InstituteModel::where('user_id', auth()->user()->id)->first();
    
    if($institute)
    {
    $institute->premium = -2;
    $institute->save();
    }
   
    echo json_encode(1);
  }



  public function get_admission(Request $request){
    $institute = InstituteModel::where('user_id', auth()->user()->id)->first();
    $institute->admission = $request->admission;
    $institute->save();
  }




  
public function institute_store(Request $request)
{
//print_r(($_POST['Facilities']));exit();
$faci=array();
$fac=$_POST['Facilities'];
for($i=0;$i<count($fac);$i++)
{
    if($fac[$i]=="")
    {
       
    }
    else
    {
        $faci[]=$fac[$i];
    }
}
//print_r($faci);exit();
$cat=$request->cat;
    $input = $request->all();
    $gallery = array();
    $videos = array();
    $input = $request->all();
    $cat_images = array();
    if ($files = $request->file('gallery')) {
      //  count($request->file('gallery'));exit();
      foreach ($files as $file) {
        $extenstion = $file->getClientOriginalExtension();
        $name = uniqid() . '.' . $extenstion;
        //  $name=$file->getClientOriginalName().time();
        $file->move(('public/images/'), $name);
        $cat_images[] = $name;
      }
      // print_r($cat_images);exit();
    }
    if ($files = $request->file('videos')) {
      foreach ($files as $file) {
        $extenstion = $file->getClientOriginalExtension();
        $data = uniqid() . '.' . $extenstion;
        $file->move(('public/images/'), $data);
        $videos[] = $data;
      }
    }
//print_r($videos);exit();
    if ($request->file('photo')) {

      $file = $request->file('photo');
      $filename = date('YmdHi') . $file->getClientOriginalName();

      $file->move(('public/images/'), $filename);
    }else{
        $filename='';
    }

    $users = DB::table('users')->latest('created_at')->first();
   
  $uid =  auth()->user()->id;
    $purifier = new HTMLPurifier();
    $details = $purifier->purify($request->address);
    $institute = new InstituteModel();
    $institute->state = $request->state;
    $institute->city = $request->city;
    $institute->state = $request->state;
    $institute->city = $request->city;
    $institute->name = $request->name;
    $institute->address =   $details;
    $institute->photo = $filename;
    $institute->ownership = $request->ownership;
    $institute->board = $request->board;
    $institute->cost = $request->cost;
     $institute->max_cost = $request->cost_max;
    $institute->establishment = $request->establishment;
    $institute->d_status = $request->d_status;
    $institute->acres = $request->acres;
    $institute->m_fees = $request->m_fees;
    $institute->c_type = $request->c_type;
    $institute->c_offered = $request->c_offered;
    $institute->c_offered = $request->c_offered;
    $institute->email = $request->ins_email;

    $institute->start_date = $request->start_date;
    $institute->end_date = $request->end_date;
      $institute->admission = 0;
    // $institute->ratio=$request->ratio;
    // $institute->school_type =  $request->school_type;
    $institute->user_id = $uid;


    $institute->eligibility = $request->eligibility;
    $institute->marks =  $request->marks;
    $institute->seats =  $request->seats;
    $institute->hostel_num = $request->test;
    $institute->s_interaction = $request->s_interaction;
    $institute->p_interaction = $request->p_interaction;
    $institute->form_availibility = $request->form_availibility;
    $institute->form_payment = $request->form_payment;
    $institute->school_time = $request->school_time;
    $institute->office_time = $request->office_time;
    $institute->awards = $request->awards;
    $institute->student_name = $request->student_name;
    $institute->student_description = $request->student_description;
    $institute->class = $request->class;
      $institute->admission_fee = $request->admission_fees;
          $institute->other_fees = $request->other_fees;
    $institute->type = $cat;
    $fcount=count($_POST['Facilities']);
   
    $institute->facilities = $faci;
    
   
   
    $institute->gallery =  $cat_images;
    $institute->videos =  $videos;
     $institute->enable =  1;
      
    $institute->u_phone =  $request->u_phone;
    $institute->u_location =  $request->u_location;


    $institute->save();
    if ($institute) {
        
      $user = user::where('id', auth()->user()->id)->update(array('email_verified' => 1));
          if($cat=="s")
          {
               return redirect('profile1');
          }
          else
          {
              $id= $institute->id;
             return redirect('course_offered?cat='.$cat.'&&id='.$id); 
          }
     
    } else {
      return back()->with('errstatus', 'Failed To Enter Data');
    }
  }
public function course_offered_form()
{
     
    $cat=$_GET['cat'];
    if($cat=="pu")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->where('status',1)->get();
    }
    else if($cat=="ug")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->where('status',1)->get();
    }
    else if($cat=="pc")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->where('status',1)->get();
    }
    $course_offered=CollegeCoursesModel::where('ins_id',$_GET['id'])->get();
    $stream=Streams::where('status',1)->get();
    // print_r($stream);exit();
    // print_r($courses);exit();
    return view('client.course_offered', compact('courses','course_offered','stream'));
}



  public function get_imageRemove()
  {
    $id = $_POST['catlogid'];
    $i = $_POST['pos'];
    $institute = InstituteModel::where('id', $id)->first();
    $cat_img = $institute->gallery;
    // print_r($cat_img);
    $cat = array();
    $count = count($cat_img);
    if (!empty($cat_img)) {



      if (!empty($cat_img[$i])) {

        unlink('public/images/' . $cat_img[$i]);
        unset($cat_img[$i]);

        $count = count($cat_img);
        $i = 0;
        foreach ($cat_img as $x => $val) {
          //    echo"hixcxc";exit();
          //   exit();

          $cat[$i] = $val;
          $i++;
        }


        //  print_r($cat);exit();
        $institute->gallery = $cat;
        $institute->save();
      }
    }
  }
  public function institution_update(Request $request)
  {
//      print_r($request->board);exit();
//     $id = $_POST['id'];

//     $institute = InstituteModel::where('user_id', $id)->first();
//     // print_r($institute);exit();
//     $gallery = $institute->gallery;

//     $input = $request->all();
//     $gallery = array();
//     $videos = array();
//     if ($files = $request->file('gallery')) {
//       // echo"hi";exit();
//       $gallery = $institute->gallery;
//       foreach ($files as $file) {
//         $extenstion = $file->getClientOriginalExtension();
//         $name = uniqid() . '.' . $extenstion;
//         //  $name=$file->getClientOriginalName().time();
//         $file->move(('public/images/'), $name);
//         $gallery[] = $name;
//       }
//     } else {
//       // echo"sd";exit();
//       $gallery = $institute->gallery;
//     }

//     $videos = $institute->videos;
//     if ($files = $request->file('videos')) {
//       $videos = $institute->videos;
//       foreach ($files as $file) {
//         $extenstion = $file->getClientOriginalExtension();
//         $data = uniqid() . '.' . $extenstion;
//         $file->move(('public/images/'), $data);
//         $videos[] = $data;
//       }
//     } else {
//       //echo"sd";exit();
//       $videos = $institute->videos;
//     }

//     $filename = $institute->photo;
//     if ($request->file('photo')) {
//       //unlink('public/images/'.$institute->photo) ;
//       $file = $request->file('photo');
//       $filename = date('YmdHi') . $file->getClientOriginalName();

//       $file->move(('public/images/'), $filename);
//     } else {
//       $filename = $institute->photo;
//     }
//     $purifier = new HTMLPurifier();
//     $details = $purifier->purify($request->address);
//     $institute->state = $request->state;
//     $institute->city = $request->city;
//     $institute->state = $request->state;
//     $institute->city = $request->city;
//     $institute->name = $request->name;
//     $institute->address =   $details;
//     $institute->photo = $filename;
//     $institute->ownership = $request->ownership;
//     $institute->board = $request->board;
//     $institute->cost = $request->cost;
//     $institute->establishment = $request->establishment;
//     $institute->d_status = $request->d_status;
//     $institute->acres = $request->acres;
//     $institute->m_fees = $request->m_fees;
//     $institute->c_type = $request->c_type;
//     $institute->c_offered = $request->c_offered;

//     $institute->start_date = $request->start_date;
//     $institute->end_date = $request->end_date;
//     // $institute->ratio=$request->ratio;
//     // $institute->school_type =  $request->school_type;
//  $institute->user_id = $uid;


//     $institute->eligibility = $request->eligibility;
//     $institute->marks =  $request->marks;
//     $institute->seats =  $request->seats;
//     $institute->hostel_num = $request->test;
//     $institute->s_interaction = $request->s_interaction;
//     $institute->p_interaction = $request->p_interaction;
//     $institute->form_availibility = $request->form_availibility;
//     $institute->form_payment = $request->form_payment;
//     $institute->school_time = $request->school_time;
//     $institute->office_time = $request->office_time;
//     $institute->awards = $request->awards;
//     $institute->student_name = $request->student_name;
//     $institute->student_description = $request->student_description;
//     $institute->class = $request->class;
//     // $institute->infrastructure = $request->infrastructure;
//     // $institute->security = $request->security;
//     // $institute->lab =  $request->lab;
//     // $institute->activities =  $request->activities;
//     // $institute->s_activities =  $request->s_activities;
//     $institute->gallery =  $gallery;
//     $institute->videos =  $videos;

//     $institute->u_phone =  $request->u_phone;
//     $institute->u_location =  $request->u_location;
//     $institute->facilities =  $request->facilities;
//     $institute->save();


//     $alert = ['success', 'Updated successfully'];
//     return back()->withAlert($alert);
  }



  public function institution_destroy($id)
  {
    $institute = InstituteModel::find($id);
    $institute->delete();
    $alert = ['success', 'Deleted successfully'];
    return back()->withAlert($alert);
  }
  
  



  
  

 public function courseoffered_destroy($id)
  {
    $collegecourse = CollegeCoursesModel::find($id);
    $collegecourse ->delete();
    $alert = ['success', 'Deleted successfully'];
    return back()->withAlert($alert);
  }
  
  
    public function forgotpassword(Request $request)
    {


        $email = $request->email;
        $pass= bin2hex(random_bytes(6));
       // $pass = "123";
       $user=User::where('email',$email)->first();
if($user)
{
        $host = request()->getHttpHost();

        $msg = "<p style='color:#000'>You have requested a password reset for your SchoolsPe account.</p>";
        $msg .= "<p style='color:#000'>Please use the new password below to login.</p>";
        
        $msg .= "<div class='card'>
          <div class='card-body'>
           <h4>Username:&nbsp;" . $email . "</h4>
          <h4>New Password:&nbsp;" . $pass . "</h4>
             
          </div>
          </div>";
        $msg .= "<p style='color:#000;font-weight:400;font-size:12px'>If the request is made accidentally or not requested by you, ignore this email. Worry not, your password won't be changed unless initiated by you.
         If you're having trouble , Please reach us on +91 8431367561 or write to us at &nbsp;<a href='support@schoolspe.com'>support@schoolspe.com.</a></p>";
         $msg .= "<p style='color:#000'>Team SchoolsPe</p>";
        
        $img = "https://schoolspe.in/schoolspe/public/images/logo.png";
        $msg .= "<img src='https://schoolspe.in/public/images/logo.png' height='41px' width='216px'>";
    
     
      
        $sender = 'info@schoolspe.com';
        $recipient = $email;
        $subject = "Password Reset Request - SchoolsPe";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= 'From:' . $sender;


        $data = $request->all();
        
       
      $user->password=bcrypt($pass);
      $user=$user->save();
       if($user)
       {
           $ms[0]=$email;
        $ms[1]=$pass;
        
       $mail= Mail::to($email)->send(new Schoolspe($ms));
    $mail= Mail::to('info@schoolspe.com')->send(new Schoolspe($ms));
       }
        if($mail)
        {
            
            return back()->with('success', 'Kindly use the login credentials which are sent to your mail to login. Thank you ');
        }
        else
        {
            return back()->with('success', 'Sorry!! Unable to send mail, try later.');
        }
}
else
{
  
   return back()->with('success', 'You are not registered please sign up.');  
}
        
    }
  


public function get_phonevalidation(Request $request)
{
     $data=UserparentModel::where('id',$request->id)->where('phone',$request->phone)->count();
     if($data>0)
     {
         
     }
     else
     {
            if($request->phone)
            {
                $status=0;
                $data=UserparentModel::where('phone',$request->phone)->first();
                if($data)
                {
                        $status=1;
                }
            echo json_decode($status);
           }
     }
}

}
