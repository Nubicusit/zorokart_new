<?php
namespace App\Http\Controllers\institute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteModel;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Auth;
use App\Models\User;
use App\Models\InsMessageModel;
use App\Models\CollegeModel;
use App\Models\Streams;
use App\Models\Courses;
use App\Models\Content;
use App\Models\CollegeCoursesModel;
use App\Models\ApplicationModel;
use HTMLPurifier;
use App\Models\CounsellorModel;
use Session;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class InstitutedasboardController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
//COURSES
public function ins_change_password()
{
   $pass=bcrypt($_POST['password1']);
  //print_r(bcrypt($_POST['password']));
  //die;
  $id=auth()->user()->id;
  $user=DB::table('users')->where('id',$id)->update(array('password'=>$pass));
  //print_r($user);
 // return back()->with('success', 'Password Changed Successfully!');
  
  return redirect("institute")->withSuccess('Password changed successfully, please login again');
}
public function admission_pdf($id)
{


     
   $data= ApplicationModel::find($id);
  //echo"sdD";exit();
    $institute=InstituteModel::where('id',$data->ins_id)->first();
       
     $pdf = PDF::loadView('PDF.admission', compact('data','institute'));
      return $pdf->download('Admission.pdf');
}
public function ins_delete()
{
    // echo "hi";
    // exit();
$id=auth()->user()->id;
// print_r($id);
$user=DB::table('users')->where('id',$id)->update(array('status'=>0));
// print_r($user);

return redirect('/')->withSuccess(' Account Deleted!');
}
public function ins_Institutions($id)
{
  $lead_count=CounsellorModel::where('ins_id',$id)->count();
  $institution =InstituteModel::find($id);
  $add_offline_count=ApplicationModel::where('ins_id',$id)->where('mode_of_pay',1)->count();
  $add_online_count=ApplicationModel::where('ins_id',$id)->where('mode_of_pay',2)->count();
  $addmissions=ApplicationModel::where('ins_id',$id)->orderBy('id','desc')->get();
  $ad_count=ApplicationModel::where('ins_id',$id)->count();
  //print_r($ad_count);exit();
  return view('institute.ins_institution', compact('lead_count','ad_count','institution','id','add_offline_count','add_online_count','addmissions')); 
}
public function discount_date()
{
  $id=$_GET['id'];
  $institute=InstituteModel::find($id);
  $institute->discount=$_GET['discount'];
  $institute->valid_date=$_GET['valid_date'];
  $institute->save();
  return back();
}
public function seat_remain()
{
  $id=$_GET['id'];
$institute=InstituteModel::find($id);
$institute->seat_remain=$_GET['seat'];
$institute->save();
return back();
}
public function remove_ins_image(Request $request,$i,$id)
{
 //  echo $i;exit();
    // $id = $_POST['catlogid'];
    // $i = $_POST['pos'];
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
   return back();
}
public function ins_institution(Request $request)
{
    $institution =InstituteModel::
        join('users', 'institute.user_id', '=', 'users.id')
        ->select('*','institute.id as id')
        ->where('users.id',Auth::user()->id)
        ->first();
   return view('institute.institution', compact('institution'));  
}
public function remove_ins_video(Request $request,$i,$id)
{
 //  echo $i;exit();
    // $id = $_POST['catlogid'];
    // $i = $_POST['pos'];
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
   return back();
}
 public function ins_course_offered(Request $request)
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
        ->where('users.id',Auth::user()->id)
        ->first();
  $id=$_POST['ins_id'];
   $collegeoffereddata= CollegeCoursesModel::create($centreaddarray);
   $course_offered = CollegeCoursesModel::where('ins_id',$_POST['ins_id'])->get();
   $stream=Streams::get();
 return view('institute.edit_ins_course', compact('courses','course_offered','stream','id','cat','institution'));
  }
public function edit_ins_course()
{
     $institution =InstituteModel::
        join('users', 'institute.user_id', '=', 'users.id')
        ->select('*','institute.id as id')
        ->where('users.id',Auth::user()->id)
        ->first();
    $id=$_GET['id'];
     $cat=$_GET['cat'];
    if($cat=="pu")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->get();
    }
    else if($cat=="ug")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->get();
    }
    else if($cat=="pc")
    {
        $courses = Courses::where('type',$cat)->orderBy('id','desc')->get();
    }
    $course_offered=CollegeCoursesModel::where('ins_id',$_GET['id'])->get();
    $stream=Streams::get();
    return view('institute.edit_ins_course', compact('courses','course_offered','stream','id','cat','institution'));
   
}

public function admission_date_update(Request $request)
{    
    $current_date=date('Y-m-d');
    $id=$request->id;
     $institution =InstituteModel::find($id);
     $institution->start_date=$_POST['start_date'];
     $institution->end_date=$_POST['end_date'];
        
      if (($current_date >=  $institution->start_date) && ($current_date <=$institution->end_date))
     {
        $institution->admission=$_POST['admission']=1;
     }
     else
     {
          $institution->admission=$_POST['admission']=0;
     }
     
     $institution->save();
     return back();
     
}

public function ins_msg()
{
 $insmsg=InsMessageModel::where('user_id',auth()->user()->id)->get();
     
  
    
   return view('institute.insmsg',compact('insmsg'));
}
public function college_offered(Request $request)
  {
      // echo "hi";
      // exit();
      $courses = Courses::get();
      
      $centreaddarray = array(
      'course_id'=>$request->course_id,
      'stream_id'=>$request->stream_id,
      'ins_id'=>$request->ins_id,
      'course_fee'=>$request->course_fee,
      'course_duration'=>$request->course_duration,
      
      
  );
   $collegeoffereddata= CollegeCoursesModel::create($centreaddarray);
   $course_offered = CollegeCoursesModel::where('ins_id',$_GET['ins_id'])->get();
   $stream=Streams::get();
  return back()->with('successs', 'Send successfully.');
  // return view('client.course_offered',compact('course_offered','courses','stream'));
  }
  
  
  
  
  
  
public function  edit_school(Request $request)
{
    $cat=$_GET['type'];
     return view('client.edit_school_details',compact('cat'));
}
public function  ins_profile_update(Request $request)
{
    $institute=InstituteModel::where('user_id',auth()->user()->id)->orderBy('id','asc')->first();
      $filename=$institute->photo;
  if ($request->file('image')) {

    $file = $request->file('image');
    $filename = date('YmdHi') . $file->getClientOriginalName();

    $file->move(('public/images/'), $filename);
     $profimg=$institute->photo;
     if($profimg)
     {
          unlink('public/images/' . $profimg);
     }
    
  }
  
   else{
   $filename=$institute->photo;
   }
  
  
  
 
  if ($institute) {
    $user = user::where('id', auth()->user()->id)->update(
        array('user_phone' => $request->phone,
        'email'=>$request->email,
        'user_name'=>$request->name,
        'image'=>$filename
        ));
    return redirect('profile1')->withSuccess(' Details Updatedsuccessfully!');
}
}
  public function edit_college_courses()
  {
   
        $id=Auth::user()->id;
        $institute = InstituteModel::where('user_id',$id)->first();
        return view('institute.edit_details_of_school',compact('institute'));
 }
 public function  edit_college_details()
  {
         $id=Auth::user()->id;

         $courses=Courses::where('type',2)
                 ->orwhere('type',4)
                 ->get();
                 
         $institution=CollegeModel::join('users', 'college.user_id', '=', 'users.id')
                   ->orwhere('users.id',$id)
                   ->first();
                   
        return view('institute.edit_details_of_college',compact('institution','courses'));
  }
  
  
  

     public function institute_addmission()
    {
        $institution=InstituteModel::where('user_id',auth()->user()->id)->first();
        
        $listing = ApplicationModel::first();
        $title = 'All Listings';
       
        return view('institute.admission',compact('institution','listing','title'));
    }
    
    
 
 
     public function institute_dashboard()
    {
        $institution=InstituteModel::where('user_id',auth()->user()->id)->first();
        return view('institute.dashboard',compact('institution'));
    }
    
    
    public function ins_msgdelete($id)
{
    $ins_msg=InsMessageModel::find($id);
    $ins_msg->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);   
}
    
  public function institution_update1(Request $request)
  {
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
    // print_r($request->Facilities);exit();
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

   
    if ($request->file('photo')) {
         $filename = $institute->photo;
         if( $filename)
         {
            unlink('public/images/'.$institute->photo) ; 
         }
    //   echo "fdf";exit();
      $file = $request->file('photo');
      $filename = date('YmdHi') . $file->getClientOriginalName();

      $file->move(('public/images/'), $filename);
    } else {
      $filename = $institute->photo;
    }
    $purifier = new HTMLPurifier();
    $details = $purifier->purify($request->address);
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

    $institute->start_date = $request->start_date;
    $institute->end_date = $request->end_date;
    // $institute->ratio=$request->ratio;
    // $institute->school_type =  $request->school_type;
    // $institute->user_id = $uid;


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
    // $institute->infrastructure = $request->infrastructure;
    // $institute->security = $request->security;
    // $institute->lab =  $request->lab;
    // $institute->activities =  $request->activities;
    // $institute->s_activities =  $request->s_activities;
    $institute->gallery =  $gallery;
    $institute->videos =  $videos;

    $institute->u_phone =  $request->u_phone;
    $institute->u_location =  $request->u_location;
    $institute->facilities = $faci;
    $institute->admission_fee = $request->admission_fees;
     $institute->other_fees = $request->other_fees;
    $institute->save();

   Session::flash('status', 'Updated successfully!'); 
     return back()->with('status','Updated successfully');
    
   
  }   
  public function application_search()
  {
    $id=$_GET['id'];
    $institution = InstituteModel::where('user_id',$id)->first();
    //print_r($institution);exit();
    // $listings = ApplicationModel::where('ins_id',$id)
    // ->where('mode_of_pay',$_GET['mode'])
    // ->Where('name', 'like', '%' . $_GET['keyword'] . '%')
    // ->orWhere('application_no', 'like', '%' . $_GET['keyword'] . '%')
    // ->get();
    
    $listings = ApplicationModel::
           where('mode_of_pay', '=',$_GET['mode'])
           -> where('ins_id', '=',$id)
           ->where(function ($query) {
               $query->Where('application_no', 'like', '%' . $_GET['keyword'] . '%')
                     ->orWhere('name', 'like', '%' . $_GET['keyword'] . '%');
           })
           ->get();

    $title = 'All Listings';
   $keyword=$_GET['keyword'];
    return view('institute.admission',compact('institution','listings','title','id','keyword'));
  }
  
   public function admission($id)
    {
    
        $institution = InstituteModel::where('id',$id)->first();
        //print_r($institution);exit();
        $listings = ApplicationModel::where('ins_id',$id)->where('mode_of_pay',$_GET['mode'])->get();
        $title = 'All Listings';
       $keyword="";
        return view('institute.admission',compact('institution','listings','title','id','keyword'));
    }
    public function admission_view($id)
    {
    
        $institution = InstituteModel::where('user_id',$id)->first();
      
        $title = 'All Listings';
       $data=ApplicationModel::find($id);
        return view('institute.admission_view',compact('institution','data','title'));
    }
    
    
    public function add_institution()
    {
           //$course_offered = CollegeCoursesModel::where('ins_id',$id)->get();
      $stream=Streams::get();
        $courses = Courses::get();
         $institution=InstituteModel::where('user_id',auth()->user()->id)->first();
            return view('institute.add_institution',compact('institution','stream','courses'));
    }
    
    
    public function institute_datainsert(Request $request)
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
  
       $user->role=4;
         $user->user_name=$request->uname;
          $user->email=$request->uemail;
          $user->user_phone=$request->uphone;
          $user->password=0;
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
    $institute->establishment = $request->establishment;
    $institute->d_status = $request->d_status;
    $institute->acres = $request->acres;
    $institute->m_fees = $request->m_fees;
    $institute->c_type = $request->c_type;
    $institute->c_offered = $request->c_offered;

    $institute->start_date = $request->start_date;
    $institute->end_date = $request->end_date;
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
    $institute->type = $request->cat;
    $institute->facilities =  $faci;
    $institute->gallery =  $cat_images;
    $institute->videos =  $videos;
      $institute->email = $request->email;
      $institute->admission_fee = $request->admission_fees;
    $institute->u_phone =  $request->u_phone;
    $institute->u_location =  $request->u_location;
    $institute->type=$cat;
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
  
  public function ins_select()
  {
      return view('institute.ins_select');
  }
  
   
  public function help()
  {
      return view('institute.help');
  }
  
  public function remove_discount($id)
  {
    //   echo"hi";
    //   exit();
        $data= InstituteModel::find($id);
        $data->valid_date="";
        $data->discount=0;
        $data->save();
        return back()->with('status', 'Updated Successfully');
        
  }
  
  
  public function billing_info()
{
  $id=$_GET['id'];
  $institute=ApplicationModel::find($id);
  $institute->note=$_GET['note'];
  $institute->date_of_payment=$_GET['date_of_payment'];
  $institute->status=1;
  $institute->save();
  return back();
}
  
}
