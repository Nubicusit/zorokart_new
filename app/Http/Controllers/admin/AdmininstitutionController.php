<?php

namespace App\Http\Controllers\admin;
use App\Models\InstituteModel;
use App\Models\InsMessageModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\User;
use App\Models\Streams;
use HTMLPurifier;
use App\Models\CollegeCoursesModel;
use App\Models\UsercontactModel;
use DB;
use Mail;
use App\Mail\Schoolspe;
use Auth;

class AdmininstitutionController extends Controller
{

    public function __construct()
{
  //  $this->middleware('admin');
}
public function ins_reset()
{
  echo"gi";
}
 public function get_user_email()
{
   // echo"hi";exit();
    $email=trim($_POST['email']);
    $id=trim($_POST['id']);
    $user=User::where('email',$email)->count();
    
    if($user>0)
    {
        echo json_encode(1);
    }
    else
    {
     echo json_encode(0);
    }
}
 
 public function institute_datastore(Request $request)
  {
     $request->validate([
           
            'email' => 'required|email|unique:users',
           
         ]);
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
    $user=new User();
   $cat=$_POST['cat'];
   $user=new User();
  //$pass= bin2hex(random_bytes(6));
  $pass=123;
       $user->role=4;
         $user->user_name=trim($request->uname);
          $user->email=trim($request->uemail);
          $user->user_phone=trim($request->uphone);
          $user->status=trim(1);
          $user->password=trim(bcrypt($pass));
          	$user->email_verified	=1;
      //  
//print_r($useraddarray);exit();
   $users =$user->save();
$uid=$user->id;

   
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
    }
    
    else
    {
        $filename = 0;
    }

    $users = DB::table('users')->latest('created_at')->first();
    $uid = $users->id;
    $purifier = new HTMLPurifier();
    $details = $purifier->purify($request->address);
    $institute = new InstituteModel();
    $institute->state = trim($request->state);
    $institute->city = trim($request->city);
    $institute->state = trim($request->state);
    $institute->city = trim($request->city);
    $institute->name = trim($request->name);
    $institute->address =   trim($details);
    $institute->photo = trim($filename);
    $institute->ownership = trim($request->ownership);
    $institute->board = trim($request->board);
    $institute->cost = trim($request->cost);
    $institute->max_cost =trim( $request->cost_max);
    $institute->establishment = trim($request->establishment);
    $institute->d_status = trim($request->d_status);
    $institute->acres = trim($request->acres);
    $institute->m_fees = trim($request->m_fees);
    $institute->c_type = trim($request->c_type);
    $institute->c_offered = trim($request->c_offered);

    $institute->start_date = trim($request->start_date);
    $institute->end_date = trim($request->end_date);
    // $institute->ratio=$request->ratio;
    // $institute->school_type =  $request->school_type;
    $institute->user_id = trim($uid);

    $institute->eligibility = trim($request->eligibility);
    $institute->marks =  trim($request->marks);
    $institute->seats =  trim($request->seats);
    $institute->hostel_num = trim($request->test);
    $institute->s_interaction = trim($request->s_interaction);
    $institute->p_interaction = trim($request->p_interaction);
    $institute->form_availibility = trim($request->form_availibility);
    $institute->form_payment = trim($request->form_payment);
    $institute->school_time = trim($request->school_time);
    $institute->office_time = trim($request->office_time);
    $institute->awards =$request->awards;
    $institute->student_name = $request->student_name;
    $institute->student_description = $request->student_description;
    $institute->class = trim($request->class);
    $institute->type = trim($request->cat);
    $institute->facilities =  $faci;
    $institute->gallery =  $cat_images;
    $institute->videos =  $videos;
      $institute->email = trim($request->email);
      $institute->admission_fee =trim( $request->admission_fees);
        $institute->other_fees = trim($request->other_fees);
    $institute->u_phone =  trim($request->u_phone);
    $institute->u_location =  trim($request->u_location);
    $institute->type=trim($cat);
     $institute->enable=1;
  $institute->action=0;

    $institute->save();
    if ($institute) {
        if($cat=="s")
        {
             return back()->with('status','Data Inserted Successfully');
        }
        else
        {
             $cat=$_POST['cat'];
    if($cat=="pu")
    {
        $courses = Courses::where('type',$cat)->get();
    }
    else if($cat=="ug")
    {
        $courses = Courses::where('type',$cat)->get();
    }
    else if($cat=="pc")
    {
        $courses = Courses::where('type',$cat)->get();
    }
    $id=$institute->id;
             return redirect('edit_admin_course_offered?id='.$id.'&&cat='.$cat);
        }
     
    } else {
      return back()->with('errstatus', 'Failed To Enter Data');
    }
  }
 public function edit_admin_course_offered()
{ $id=$_GET['id'];
$cat=$_GET['cat'];
if($cat=="pu")
    {
        $courses = Courses::where('type',$cat)->get();
    }
    else if($cat=="ug")
    {
        $courses = Courses::where('type',$cat)->get();
    }
    else if($cat=="pc")
    {
        $courses = Courses::where('type',$cat)->get();
    }
 
            
        
     
     $course_offered=CollegeCoursesModel::where('ins_id',$id)->get();
    $stream=Streams::get();
   
    // return view('client.course_offered', compact('courses','course_offered','stream'));
     return view('admin.institution.course_offered', compact('courses','course_offered','stream','id','cat'));
}
 public function edit_admin_course_offered_store(Request $request)
{
     // echo "hi";
      // exit();
      $cat=$_POST['cat'];
      $courses = Courses::where('type',$cat)->get();
      
      $centreaddarray = array(
      'course_id'=>$request->course_id,
      'stream_id'=>$request->stream_id,
      'ins_id'=>$request->ins_id,
      'course_fee'=>$request->course_fee,
    'course_duration'=>$request->course_duration,
      
      
  );
  $institution =InstituteModel::
        join('users', 'institute.user_id', '=', 'users.id')
        ->select('*','institute.id as id')
        ->where('institute.id',$request->ins_id)
        ->first();
  $id=$_POST['ins_id'];
   $collegeoffereddata= CollegeCoursesModel::create($centreaddarray);
   $course_offered = CollegeCoursesModel::where('ins_id',$_POST['ins_id'])->get();
   $stream=Streams::get();
  return view('admin.institution.course_offered', compact('courses','course_offered','stream','id','cat'));
}
  public function Admincollege_offered(Request $request)
  {
      // echo "hi";
      // exit();
      $cat=$_POST['cat'];
      $courses = Courses::get();
      
      $centreaddarray = array(
      'course_id'=>$request->course_id,
      'stream_id'=>$request->stream_id,
      'ins_id'=>$request->ins_id,
      
      
  );
  $id=$_POST['ins_id'];
   $collegeoffereddata= CollegeCoursesModel::create($centreaddarray);
   $course_offered = CollegeCoursesModel::where('ins_id',$_POST['ins_id'])->get();
   $stream=Streams::get();
  return view('admin.institution.course_offered', compact('courses','course_offered','stream','id','cat'));
  }
  
  
  public function admin_ins_update(Request $request)
  {
    //   echo "hi";
    //   exit();
     $current_date=date('Y-m-d');  
      
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
    $id=$_POST['id'];
  
    $id = $_POST['id'];

    $institute = InstituteModel::where('id', $id)->first();
    // print_r($institute);exit();
     $gallery = $institute->gallery;

    $input = $request->all();
    $gallery = array();
    $videos = array();
    if ($files = $request->file('gallery')) {
      // echo"hi";exit();
      $gallery = $institute->gallery;
      foreach ($files as $file) {
        $extenstion = $file->getClientOriginalExtension();
        $name = uniqid() . '.' . $extenstion;
        //  $name=$file->getClientOriginalName().time();
        $file->move(('public/images/'), $name);
        $gallery[] = $name;
      }
    } else {
      // echo"sd";exit();
      $gallery = $institute->gallery;
    }

    $videos = $institute->videos;
    if ($files = $request->file('videos')) {
      $videos = $institute->videos;
      foreach ($files as $file) {
        $extenstion = $file->getClientOriginalExtension();
        $data = uniqid() . '.' . $extenstion;
        $file->move(('public/images/'), $data);
        $videos[] = $data;
      }
    } else {
      //echo"sd";exit();
      $videos = $institute->videos;
    }

    $filename = $institute->photo;
    if ($request->file('photo')) {
      //unlink('public/images/'.$institute->photo) ;
      $file = $request->file('photo');
      $filename = date('YmdHi') . $file->getClientOriginalName();

      $file->move(('public/images/'), $filename);
    } else {
      $filename = $institute->photo;
    }
    $purifier = new HTMLPurifier();
    $details = $purifier->purify($request->address);
    $institute->state =trim($request->state);
    $institute->city = trim($request->city);
    $institute->state = trim($request->state);
    $institute->email = trim($request->email);
    $institute->name =trim( $request->name);
    $institute->address =   trim($details);
    $institute->photo = trim($filename);
    $institute->ownership = trim($request->ownership);
    $institute->board = trim($request->board);
    $institute->cost = trim($request->cost);
    $institute->max_cost = trim($request->cost_max);
    $institute->establishment =trim( $request->establishment);
    $institute->d_status = trim($request->d_status);
    $institute->acres = trim($request->acres);
    $institute->m_fees = trim($request->m_fees);
    $institute->c_type = trim($request->c_type);
    $institute->c_offered = trim($request->c_offered);
 //$institute->action=0;
    $institute->start_date =trim( $request->start_date);
    $institute->end_date = trim($request->end_date);
    // $institute->ratio=$request->ratio;
    // $institute->school_type =  $request->school_type;
    // $institute->user_id = $uid;


    $institute->eligibility = trim($request->eligibility);
    $institute->marks =  trim($request->marks);
    $institute->seats =  trim($request->seats);
    $institute->hostel_num = trim($request->test);
    $institute->s_interaction =trim( $request->s_interaction);
    $institute->p_interaction = trim($request->p_interaction);
    $institute->form_availibility =trim( $request->form_availibility);
    $institute->form_payment = trim($request->form_payment);
    $institute->school_time = trim($request->school_time);
    $institute->office_time = trim($request->office_time);
    $institute->awards = $request->awards;
    $institute->student_name = $request->student_name;
    $institute->student_description = $request->student_description;
    $institute->class = $request->class;
   // $institute->type = auth()->user()->auth_type;
    $institute->facilities =  $faci;
    $institute->gallery =  $gallery;
    $institute->videos =  $videos;
       $institute->type =trim( $request->cat);
    $institute->u_phone =  trim($request->u_phone);
    $institute->u_location =  trim($request->u_location);
       $institute->admission_fee = trim($request->admission_fees);
    $institute->other_fees = trim($request->other_fees);
       
           if (($current_date >=  $institute->start_date) && ($current_date <=$institute->end_date))
     {
        $institute->admission=trim($_POST['admission']=1);
     }
     else
     {
          $institute->admission=trim($_POST['admission']=0);
     }
    
    $institute->save();


    $alert = ['success', 'Updated successfully'];
    return back()->withAlert($alert);
  }

  public function institution(Request $request)
  {
    //print_r($_GET);die;
    
    if($_GET['cat']=="s")
    {
      $institute = InstituteModel::where('action', 0)->where('type','s')->orderBy('id','desc')->get();
      $instituteapp = InstituteModel::where('action', 1)->where('type','s')->orderBy('id','desc')->paginate(25);
      $institutereg = InstituteModel::where('action', 3)->where('type','s')->orderBy('id','desc')->get();
      $title="School";
    }
    else if($_GET['cat']=="pu")
    {
      $institute = InstituteModel::where('action', 0)->where('type','pu')->orderBy('id','desc')->get();
      $instituteapp = InstituteModel::where('action', 1)->orderBy('id','desc')->where('type','pu')->paginate(25);
      $institutereg = InstituteModel::where('action', 3)->orderBy('id','desc')->where('type','pu')->get();
       $title="PU Junior College";
     
    }
    else if($_GET['cat']=="ug")
    {
      $institute = InstituteModel::where('action', 0)->orderBy('id','desc')->where('type','ug')->get();
      $instituteapp = InstituteModel::where('action', 1)->where('type','ug')->orderBy('id','desc')->paginate(25);
      $institutereg = InstituteModel::where('action', 3)->where('type','ug')->orderBy('id','desc')->get();
       $title="UG-PG College";
    }
    else if($_GET['cat']=="pc")
    {
      $institute = InstituteModel::where('action', 0)->orderBy('id','desc')->where('type','pc')->get();
      $instituteapp = InstituteModel::where('action', 1)->orderBy('id','desc')->where('type','pc')->paginate(25);
      $institutereg = InstituteModel::where('action', 3)->orderBy('id','desc')->where('type','pc')->get();
      $title="Polytechnic College";
    }
   // print_r($instituteapp);exit();
    // type=1&keyword=&tab=2
    $instituteapp->appends(['type'=>'','keyword'=>'','tab'=>2,'cat'=>$_GET['cat']]);

    $keyword="";
    return view('admin.institution.index', compact('keyword','institute', 'instituteapp', 'institutereg','title'));
  }
  public function display_institution($id)
  {
    //   echo "hi";
    //   exit();
      
       $courses=Courses::get();
      $course_offered = CollegeCoursesModel::where('ins_id',$id)->get();
      $stream=Streams::get();
      $listing = InstituteModel::find($id);
      $user=User::where('id',$listing->user_id)->first();
     $title = 'All Listings';
    // print_r( $listing );exit();
    return view('admin.institution.details', compact('listing', 'title','courses','course_offered','stream','user'));
  }

  public function institutionstatus(Request $request)
  {
    // echo"hi";exit();
    $institute = InstituteModel::find($request->id);
    $institute->enable = $request->enable;
    $institute->save();
  }
public function enable_ins()
  {
      $id=$_GET['id'];
      $institute = InstituteModel::find($id);
      $user_id=$institute->user_id;
      $user=User::find($user_id);
      $user->enable_admin=1;
      $user->save();
      $alert = ['success', 'Admin access to institution - Enabled'];
    return back()->withAlert($alert);
  }
  public function disable_ins()
  {
      $id=$_GET['id'];
      $institute = InstituteModel::find($id);
      $user_id=$institute->user_id;
      $user=User::find($user_id);
      $user->enable_admin=0;
      $user->save();
      $alert = ['success', 'Admin access to institution - Disabled'];
    return back()->withAlert($alert);
  }
 public function enable_del_ins()
  {
       $id=$_GET['id'];
     $user=User::find($id);
     $user->status=1;
     $user->save();
     $alert = ['success', 'institute Account - Enabled'];
    return back()->withAlert($alert);
      
  }
public function ins_action()
  {
    $id = $_POST['id'];
    $institute = InstituteModel::find($id);
    $email= $institute->email;
    $msg=$institute->message;

    if($msg)
    {
      $msg=$msg."|".$_POST['message'];
    }
    else{
      $msg=$_POST['message'];
    }

    $institute->action = $_POST['action'];
    
    $ins=$institute->update();
    if($ins)
    {
        if($_POST['action']==1)
        {
        // mail
    $host = request()->getHttpHost();

//Mail::to('nishchitha@silqen.com')->send(new TestEmail('It works!'));
Mail::to($email)->send(new Schoolspe('It works!'));
Mail::to('info@schoolspe.com')->send(new Schoolspe('It works!'));
        }
    // mail
        if(isset($_POST['message']))
        {
       $insmsg = new InsMessageModel();
       $insmsg->message=$_POST['message'];
       $insmsg->ins_id=$id;
        $insmsg->status=0;
       $insmsg->user_id=$institute->user_id;
       $insmsg->save();
        }
      
    }
    
    $alert = ['success', 'Action updated successfully and mail sent successfully!'];
    return back()->withAlert($alert);
  }
  
  public function  ins_search()
  {
    //print_r($_GET);exit();
    // echo"hi";exit();
    $cat=$_GET['cat'];
    if(isset($_GET['submit']))
    {
      echo $_GET['submit'];
     
      return redirect('institution?cat='.$cat);
      exit();
    }
    $institute = InstituteModel::where('action', 0)->where('type',$cat)->get();
    $instituteapp = InstituteModel::where('action', 1)->where('type',$cat)->paginate(25);
    $institutereg = InstituteModel::where('action', 2)->where('type',$cat)->get();



    if ($_GET['tab'] == 1)
    {
        //  echo "tab1";
        // exit();
      if ($_GET['type'] == 1)
      {
        $institute = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 0)->get();
      } else if ($_GET['type'] == 2) {
        $institute = InstituteModel::Where('u_phone', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 0)->get();
      } else if ($_GET['type'] == 3) {
        $institute = InstituteModel::Leftjoin('users', 'institute.user_id', '=', 'users.id') ->where('type',$cat)->select('*', 'users.id as id') ->Where('users.email', 'like', '%' . $_GET['keyword'] . '%')->where('action', 0)->get();
      } else
      {
        $institute = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 0)->get();
      }
    }





    else if ($_GET['tab'] == 2)
    {
        //  echo "tab2";
        // exit();
      if ($_GET['type'] == 1)
      {
        $instituteapp = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 1)->paginate(25);
      } else if ($_GET['type'] == 2) {
        $instituteapp = InstituteModel::Where('u_phone', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 1)->paginate(25);
      } else if ($_GET['type'] == 3) {
        $instituteapp = InstituteModel::Leftjoin('users', 'institute.user_id', '=', 'users.id') ->where('type',$cat)->select('*', 'users.id as id')->where('action', 1)->Where('users.email', 'like', '%' . $_GET['keyword'] . '%') ->paginate(25);
      }
      else if ($_GET['type'] == 4) 
      {
       $instituteapp = InstituteModel::where('type',$cat)->where('premium', 1)->where('action',1)->paginate(25);
      } 
    else if ($_GET['type'] == 5) {
        $instituteapp = InstituteModel::where('type',$cat)->where('premium',-4)->where('action',1)->paginate(25);
      }
      else if ($_GET['type'] == 6) {
       $instituteapp = InstituteModel::where('type',$cat)->where('premium',-2)->where('action',1)->paginate(25);
      } else if ($_GET['type'] == 7) {
        $instituteapp = InstituteModel::where('type',$cat)->where('premium',0)->where('action',1)->paginate(25);
      }
      else {
        $instituteapp = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 1)->paginate(25);
      }
    }



    else
    {
        // echo "else";
        // exit();
      if ($_GET['type'] == 1)
      {
        $institutereg = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 2)->get();
      } else if ($_GET['type'] == 2)
      {
        $institutereg = InstituteModel::Where('u_phone', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)->where('action', 2)->get();
      } else if ($_GET['type'] == 3)
      {
        $institutereg = InstituteModel::Leftjoin('users', 'institute.user_id', '=', 'users.id') ->where('type',$cat)>select('*', 'users.id as id')->Where('users.email', 'like', '%' . $_GET['keyword'] . '%') ->where('action', 2)->get();
      } 
      
      else
      {
        $institutereg = InstituteModel::Where('name', 'like', '%' . $_GET['keyword'] . '%')->where('type',$cat)>where('action', 2)->get();
      }
    }
    $title = 'All Listings';
   // exit();
   $keyword=$_GET['keyword'];
    $instituteapp->appends(['type'=>$_GET['type'],'cat'=>$_GET['cat'],'keyword'=>$_GET['keyword'],'tab'=>2]);
     //print_r( $instituteapp );exit();
    return view('admin.institution.index', compact('keyword','institute', 'title', 'institutereg', 'instituteapp'));
  }


public function admin_user_update(Request $request,User $users)
{
    $id=$request->id;
   
         $dup_email=User::where('email',$request->email)->where('id',$id)->count();
         if($dup_email==0)
         {
            
             $request->validate([
           'email' => 'required|email|unique:users',
           
        ]);
         }
         
   
      $users=User::find($id);
      
      $users->user_name=trim($request->user_name);
      $users->email=trim($request->email);
      $users->user_phone=trim($request->user_phone);
      $users->save();

       $alert = ['success','Updated successfully'];
       return back()->withAlert($alert); 
}
   
   public function get_course_destroy(Request $request)
  {
      $id = $_POST['id'];
    $collegecourse = CollegeCoursesModel::find($id);
    $collegecourse ->delete();
   echo json_encode(1);
    
  }
  
  
    public function institution_edit($id)
  {
   $institute = InstituteModel::find($id);
   $user=User::where('id',$institute->user_id)->first();
 
//   print_r($user);
//   exit();

    
    return view('admin.institution.edit', compact('institute','user'));
  }
  
  
 
 }
