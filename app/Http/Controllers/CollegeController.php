<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use  \Illuminate\Support\Facades\Session;
use App\Models\PropertyRequest;
use App\Models\CollegeModel;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use HTMLPurifier;
use App\Models\Courses;
use App\Models\CollegeCoursesModel;
use App\Models\Streams;

class CollegeController extends Controller
{
  public function get_college_imageRemove()
    {
      $id=$_POST['catlogid'];
      $i=$_POST['pos'];
      $institute=CollegeModel::where('id',$id)->first();
      $cat_img=$institute->gallery;
     // print_r($cat_img);
      $cat=array();
      $count=count($cat_img);
       if(!empty($cat_img))
  {
     


               if(!empty($cat_img[$i]))
                     {
                      
                     unlink('public/images/'.$cat_img[$i]) ;
                    unset($cat_img[$i]);
                     
                    $count=count($cat_img);
                   $i=0;
                    foreach($cat_img as $x => $val) {
                  //    echo"hixcxc";exit();
                   //   exit();
                      
                        $cat[$i] = $val;
                        $i++;
                      
                    } 
                  
                  
                  //  print_r($cat);exit();
                  $institute->gallery=$cat;
                   $institute->save();      
                  }
  }
      
     

    }
  public function get_college_videoRemove()
  {
    $id=$_POST['catlogid'];
    $i=$_POST['pos'];
    $institute=CollegeModel::where('id',$id)->first();
    $cat_img=$institute->videos;
   // print_r($cat_img);
    $cat=array();
    $count=count($cat_img);
     if(!empty($cat_img))
{
   


             if(!empty($cat_img[$i]))
                   {
                    
                   unlink('public/images/'.$cat_img[$i]) ;
                  unset($cat_img[$i]);
                   
                  $count=count($cat_img);
                 $i=0;
                  foreach($cat_img as $x => $val) {
                //    echo"hixcxc";exit();
                 //   exit();
                    
                      $cat[$i] = $val;
                      $i++;
                    
                  } 
                
                
                //  print_r($cat);exit();
                $institute->videos=$cat;
                 $institute->save();      
                }
}
    
   
  }
  public function college(Request $request)
  {
    $courses = Courses::get();
    $college = CollegeModel::where('action',0)->paginate(10);
    $college ->appends(['tab'=>1]);
    $collegeapp = CollegeModel::where('action',1)->paginate(10);
  
    $collegeapp->appends(['tab'=>2]);
    $collegeeg = CollegeModel::where('action',2)->paginate(10);
    $collegeeg->appends(['tab'=>3]);
    $title = 'All Listings';
    return view('admin.college.index',compact('college','collegeapp','collegeeg','courses'));
  }



  public function  clg_search()
  {
    // echo"hi";exit();
    $college = CollegeModel::where('action',0)->paginate(10);
    $collegeapp = CollegeModel::where('action',1)->paginate(10);
    $collegereg = CollegeModel::where('action',2)->paginate(10);
    if($_GET['tab']==1)
{
    if($_GET['type']==1)
    {
      $college = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
    }
    else if($_GET['type']==2)
    {    $college = CollegeModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
     
    }
    else if($_GET['type']==3)
    {
      $college = CollegeModel::
      Leftjoin('users', 'college.user_id', '=', 'users.id')
      ->select('*','users.id as id')
      ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
      ->where('action',0)
      ->paginate(1);
    }
    else
    {
      $college = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',0)->paginate(1);
    }
}else if($_GET['tab']==2)
{
  if($_GET['type']==1)
  {
    $collegeapp = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }
  else if($_GET['type']==2)
  {    $collegeapp = CollegeModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
   
  }
  else if($_GET['type']==3)
  {
    $collegeapp = CollegeModel::
    Leftjoin('users', 'college.user_id', '=', 'users.id')
    ->select('*','users.id as id')
    ->where('action',1)
    ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
    ->paginate(1);
  }
  else
  {
    $collegeapp = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }

}
else
{
  if($_GET['type']==1)
  {
    $collegereg = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',2)->paginate(1);
  }
  else if($_GET['type']==2)
  {    $collegereg = CollegeModel::Where('u_phone', 'like','%'.$_GET['keyword'].'%')->where('action',2)->paginate(1);
   
  }
  else if($_GET['type']==3)
  {
    $collegereg = CollegeModel::
    Leftjoin('users', 'college.user_id', '=', 'users.id')
    ->select('*','users.id as id')
    ->Where('users.email', 'like','%'.$_GET['keyword'].'%')
    ->where('action',2)
    ->paginate(1);
  }
  else
  {
    $collegereg = CollegeModel::Where('name', 'like','%'.$_GET['keyword'].'%')->where('action',1)->paginate(1);
  }
} 
    $title = 'All Listings';
    $college->appends(['tab'=>1,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
    $collegereg->appends(['tab'=>3,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
    $collegeapp->appends(['tab'=>2,'type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
  // print_r( $listing );exit();
  return view('admin.college.index',compact('college','title','collegereg','collegeapp'));
  }


public function college_store(Request $request)
    {

     $input=$request->all();
     $gallery=array();
     $videos=array();
    if($files=$request->file('gallery'))
    {
      foreach($files as $file)
      {
          $name=$file->getClientOriginalName();
          $file->move(('public/images/'),$name);
          $gallery[]=$name;
          
      }
  }
 
if($files=$request->file('videos'))
{
  foreach($files as $file)
  {
      $data=$file->getClientOriginalName();
      $file->move(('public/images/'),$data);
      $videos[]=$data;
  }
}

if($request->file('photo'))
{
    $file= $request->file('photo');
    $filename= date('YmdHi').$file->getClientOriginalName();
    
    $file->move(('public/images/'),$filename);
    
}

    //   $purifier = new HTMLPurifier();
    //   $details = $purifier->purify($request->details);
      $college = new CollegeModel();
      
       
        $college->name = $request->name;
        $college->city = $request->city;
        $college->state = $request->state;
        $college->address =  $request->address;
        $college->photo = $filename;
        $college->cost=$request->cost;
        $college->m_fees=$request->m_fees;
        $college->a_session=1;
        $college->start_date=$request->start_date;
        $college->end_date=$request->end_date;
        $college->eligibility=$request->eligibility;
        $college->marks=$request->marks;
        $college->seats=$request->seats;
        $college->test=$request->test;
        $college->s_interaction = $request->s_interaction;
        $college->p_interaction=$request->p_interaction;
        $college->form_availibility=$request->form_availibility;
        $college->form_payment=$request->form_payment;
        $college->school_time=$request->school_time;
        $college->office_time=$request->office_time;
        $college->awards=$request->awards;
        $college->student_name=$request->student_name;
        $college->student_description=$request->student_description;
        $college->class=$request->class;
        $college->infrastructure=$request->infrastructure;
        $college->security=$request->security;
        $college->lab =  $request->lab;
        $college->activities =  $request->activities;
        $college->s_activities =  $request->s_activities;
        $college->gallery =  $gallery;
        $college->videos =  $videos;
        $college->u_address =  $request->u_address;
        $college->u_phone =  $request->u_phone;
        $college->u_location =  $request->u_location;
        $college->enable=  1;
        $college->action = 0;
        $college->user_id = auth()->user()->id;

                
        $college->save();
    if($college){
       return redirect('course_offered');
        // return back()->with('status','Data Inserted Successfully');
    }
    else{
         return back()->with('errstatus','Failed To Enter Data');
    }

    }


    public function get_subcat(Request $request)
    {
     
        $id=$_POST['pos'];
        $sub_cat = Streams::where('course_id',$id)->get();
        // echo"k";exit();
       
                    $wordCount = $sub_cat->count();
                    if($wordCount>0)
                    {
                         echo"<option value=''>--Select one--</option>";
            foreach ($sub_cat as $row) {
                
              echo"<option value='".$row->id ."'>".$row->stream."</option>";
            }
          }
          else{
            
                echo"<option value='0'>No data</option>"; 
            }
   }

   
   


   public function college_update(Request $request)
   {

      $id=$_POST['id'];
  
       $college=CollegeModel::where('id',$id)->first();
       // print_r($institute);exit();
       $gallery=$college->gallery;
        
       $input=$request->all();
       $gallery=array();
       $videos=array();
      if($files=$request->file('gallery'))
      {
       // echo"hi";exit();
      $gallery=$college->gallery;
        foreach($files as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(('public/images/'),$name);
            $gallery[]=$name;
        }
    }



    else
 {
     // echo"sd";exit();
     $gallery=$college->gallery;
 }

 $videos=$college->videos;
  if($files=$request->file('videos'))
  {
   $videos=$college->videos;
    foreach($files as $file)
    {
        $data=$file->getClientOriginalName();
        $file->move(('public/images/'),$data);
        $videos[]=$data;
    }
  }

  else
  {
      //echo"sd";exit();
      $videos=$college->videos;
  }
  
  $filename=$college->photo;
  if($request->file('photo'))
  {
     
      $file= $request->file('photo');
      $filename= date('YmdHi').$file->getClientOriginalName();
      
      $file->move(('public/images/'),$filename);
      
  }
  else{
   $filename=$college->photo;
 }
  
 
 $college->name = $request->name;
 $college->city = $request->city;
 $college->state = $request->state;
 $college->address = 1;
 $college->photo = $filename;
 $college->cost=$request->cost;
 $college->m_fees=$request->m_fees;
 $college->start_date=$request->start_date;
 $college->end_date=$request->end_date;
 $college->eligibility = $request->eligibility;
 $college->marks =  $request->marks;
 $college->seats =  $request->seats;
 $college->test = 1;
 $college->s_interaction = $request->s_interaction;
 $college->p_interaction=$request->p_interaction;
 $college->form_availibility=$request->form_availibility;
 $college->form_payment=$request->form_payment;
 $college->school_time=$request->school_time;
 $college->office_time=$request->office_time;
 $college->awards=$request->awards;
 $college->student_name=$request->student_name;
 $college->student_description=$request->student_description;
 $college->class=$request->class;
 $college->infrastructure=$request->infrastructure;
 $college->security=$request->security;
 $college->lab =  $request->lab;
 $college->activities =  $request->activities;
 $college->s_activities =  $request->s_activities;
 $college->gallery =  $gallery;
 $college->videos =  $videos;
 $college->u_address =  $request->u_address;
 $college->u_phone =  $request->u_phone;
 $college->u_location =  $request->u_location;
 $college->action = 1;

    
     $college->save();
   

    $alert = ['success','Updated successfully'];
    return back()->withAlert($alert);
    }



   public function college_destroy($id)
   {
     $college=CollegeModel::find($id);
     $college->delete();
     $alert = ['success','Deleted successfully'];
     return back()->withAlert($alert);   
   }


   public function clg_action()
   {
     $id=$_POST['id'];
     $college=CollegeModel::find($id);
     $college->action=$_POST['action'];
     $college->message=$_POST['message'];
     $college->update();
     $alert = ['success','Action updated successfully'];
     return back()->withAlert($alert); 

   }

   public function display_college($id)
   {
    //   echo"hi";
    //   exit();
    
      $courses=Courses::get();
        $course_offered=Courses::get();
        $stream=Streams::get();
       $listing = CollegeModel::find($id);
       $title = 'All Listings';
     // print_r( $listing );exit();
     return view('admin.college.display',compact('listing','title','courses','course_offered','stream'));
   }

   public function collegestatus(Request $request)
   {
     // echo"hi";exit();
     $college = CollegeModel::find($request->id);
     $college->enable = $request->enable;
     $college->save();
   }
   public function college_edit($id)
   {
    $institute = CollegeModel::find($id);
    return view('admin.college.edit', compact('institute'));
   }
   
   
   public function course_offered_form()
    {
        $course_offered = CollegeCoursesModel::get();
        $courses = Courses::get();
        $stream=Streams::get();
        return view('client.course_offered',compact('courses','course_offered','stream'));
    } 
   public function college_offered(Request $request)
  {
      // echo "hi";
      // exit();
      $courses = Courses::get();
      
      $centreaddarray = array(
      'course_id'=>$request->course_id,
      'stream_id'=>$request->stream_id,
      'ins_id'=>auth()->user()->id,
      
      
  );
   $collegeoffereddata= CollegeCoursesModel::create($centreaddarray);
   $course_offered = CollegeCoursesModel::get();
   $stream=Streams::get();
  
   return view('client.course_offered',compact('course_offered','courses','stream'));
  } 
  
  
   public function edit_college_course($id)
   {
    $institute = CollegeModel::find($id);
    $course_offered = CollegeCoursesModel::get();
    $courses = Courses::get();
    $stream=Streams::get();
    return view('admin.college.course_edit', compact('institute','course_offered','courses','stream'));
   }
   
   

}

  

    
