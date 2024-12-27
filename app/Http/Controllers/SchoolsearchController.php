<?php

namespace App\Http\Controllers;
use App\Models\CollegeModel;
use App\Models\InstituteModel;
use App\Models\PropertyRequest;
use App\Rules\MatchOldPassword;
use App\Models\CollegeCoursesModel;
use App\Models\Advancelead;
use DB;
use Hash;
use App\Models\Courses;
use Session;
use App\Models\Streams;
class SchoolsearchController extends Controller
{
public function  advanced_search()
{
    $name=$_GET['name'];
    $phone=$_GET['phone'];
    $email=$_GET['email'];
    $advancelead=new Advancelead();
    $advancelead->name=$name;
    $advancelead->email=$email;
    $advancelead->phone=$phone;
    $advancelead->save();

     $query = InstituteModel::query();
       $boardArray=array();
       $min=$max="";
       $streams_item=array();
       $course_item=array();
       $stdArray=array();
         if (isset($_GET['type']))
         {
              if($_GET['type']=="Schools")
              {
                  $type="s";
                  $type_title="Schools";
                  $ins_board =DB::table('institute')
                  ->select('board')
                  ->distinct()
                  ->where('type','s')
                  ->orderby('board','asc')
                  ->get();
           // print_r($ins_board);exit();
                   $courses=Courses::where('status',1)->where('type','s')->orderby('name','asc')->get();
                    $streams=Streams::where('status',1)->orderby('stream','asc')->get();
              }
              else if($_GET['type']=="PU-Junior-College")
              {
                   $type="pu";
                    $type_title="PU junior college";
                    $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','pu')
                ->orderby('board','asc')
              ->get();
                     $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
                    //  print_r($courses);
                    //  exit();
                    $streams=Streams::where('status',1)->orderby('stream','asc')->get();
              }
              else if($_GET['type']=="Polytechnic-College")
              {
                   $type="pc";
                    $type_title="Poly technic college";
                    $ins_board =DB::table('institute')
                    ->select('board')
                    ->distinct()
                    ->where('type','pc')
                    ->orderby('board','asc')
                    ->get();
                     $courses=Courses::where('status',1)->where('type','pc')->orderby('name','asc')->get();
                    
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              }
              else if($_GET['type']=="UG-PG-Colleges")
              {
                    $type="ug";
                      $type_title="UG-PG-Colleges";
                  $courses=Courses::where('status',1)->where('type','ug')->orderby('name','asc')->get();
                  $ins_board =DB::table('institute')
                  ->select('board')
                  ->distinct()
                  ->where('type','ug')
                  ->orderby('board','asc')
                  ->get();
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              $ins_board = DB::table('institute')
                    ->select('board', DB::raw('count(`board`) as occurences'))
                    ->groupBy('board')
                    ->having('occurences', '>', 1)
                    ->where('type','ug')
                    ->orderby('board','asc')
                    ->get();
              }
               $query = $query->where('type', '=',$type)->where('action',1);
         }
         if (isset($_GET['university_s']))
         {
             if($_GET['university_s']!="")
             {
             //print_r($_GET['university_s']);exit();
             $query = $query->where('board',$_GET['university_s']);
              $boardArray[]=$_GET['university_s'];
             // print_r($boardArray);
             }
         }
         if (isset($_GET['university_pu']))
         {
             if($_GET['university_pu']!="")
             {
            // print_r($_GET['university_pu']);exit();
             $query = $query->where('board',$_GET['university_pu']);
              $boardArray[]=$_GET['university_pu'];
             }
         }
         if (isset($_GET['university_pc']))
         {
             if(!empty($_GET['university_pc']))
             {
             //print_r($_GET['university_pc']);exit();
             $query = $query->where('board',$_GET['university_pc']);
              $boardArray[]=$_GET['university_pc'];
             }
         }
         if (isset($_GET['university_ug']))
         {
             if($_GET['university_ug']!="")
             {
             //print_r($_GET['university_ug']);exit();
             $query = $query->where('board',$_GET['university_ug']);
              $boardArray[]=$_GET['university_ug'];
             }
         }
          if (isset($_GET['class']))
         {
            //echo"hi";exit();
            //$course_item=$_GET['class'];
             $query = $query->where('c_offered',$_GET['class']);
              $stdArray[]=$_GET['class'];
         }
         if (isset($_GET['course_one']))
         {
             
            if(!empty($_GET['course_one']))
            {
               // echo"course_one";exit();
                  //  print_r($_GET['course_one']);exit();
                    $course_ins_id=array();
                
                    $courses=Courses::where('status',1)->Where('name', 'like', '%' . $_GET['course_one'] . '%')->where('type',$type)->orderby('name','asc')->get();
               // print_r($courses);exit();
                     foreach($courses as $c)
                    {
                        $course_ins_id[]=$c->id;
                     $course_item[]=$c->id;
                    }
                    $course_offered = CollegeCoursesModel::whereIn('course_id',$course_ins_id)->get();
                    foreach($course_offered as $c)
                    {
                        $course_ins_id[]=$c->ins_id;
                    }
                    //print_r($course_ins_id);exit();
                   
                    $query = $query->whereIn('id',$course_ins_id);
           }
        }
         if (isset($_GET['course_two']))
         {
             
            if(!empty($_GET['course_two']))
            {
               //echo"course_two";exit();
                   // print_r($_GET['course_two']);exit();
                    $course_ins_id=array();
                
                    $courses=Courses::where('status',1)->Where('name', 'like', '%' . $_GET['course_two'] . '%')->where('type',$type)->orderby('name','asc')->get();
               // print_r($courses);exit();
                    foreach($courses as $c)
                    {
                        $course_ins_id[]=$c->id;
                        $course_item[]=$c->id;
                        
                    }
                   // print_r($course_ins_id);exit();
                    $course_offered = CollegeCoursesModel::whereIn('course_id',$course_ins_id)->get();
                   // print_r($course_offered);exit();
                    foreach($course_offered as $c)
                    {
                        $course_ins_id[]=$c->ins_id;
                    }
                   // print_r($course_ins_id);exit();
                   
                    //print_r($course_item);exit();
                    $query = $query->whereIn('id',$course_ins_id);
           }
        }
         if (isset($_GET['course_three']))
         {
             
            if(!empty($_GET['course_three']))
            {
                //echo"course_three";exit();
                   // print_r($_GET['course_three']);exit();
                    $course_ins_id=array();
                
                    $courses=Courses::where('status',1)->Where('name', 'like', '%' . $_GET['course_three'] . '%')->where('type',$type)->orderby('name','asc')->get();
                //print_r($_GET['course']);exit();
                    foreach($courses as $c)
                    {
                        $course_ins_id[]=$c->id;
                         $course_item[]=$c->id;
                    }
                    
                    $course_offered = CollegeCoursesModel::whereIn('course_id',$course_ins_id)->get();
                    foreach($course_offered as $c)
                    {
                        $course_ins_id[]=$c->ins_id;
                    }
                    //print_r($course_ins_id);exit();
                   
                    $query = $query->whereIn('id',$course_ins_id);
           }
        }
          if (isset($_GET['location']))
         {
            $query->where(function ($query) {
                $query->Where('city', 'like', '%' . $_GET['location'] . '%')
                      ->orWhere('name', 'like', '%' . $_GET['location'] . '%')
                      ->orWhere('address', 'like', '%' . $_GET['location'] . '%');
            });
           // $query->Where('city', 'like', '%' . $_GET['location'] . '%');
         }
         if (isset($_GET['min']))
         {
             $min=$_GET['min'];
              $max=$_GET['max'];
             $query->where('cost', '>=',  $_GET['min'])
      ->where('max_cost', '<=', $_GET['max']);
         }
         $institute=$query->orderBy('premium', 'DESC')->where('enable',1)->where('action',1)->get();
         if($institute)
         {
              $result_count = sizeof($institute) ." ". $type_title;
         }
        
            $queryString = "Showing Search Results For \"" . $type_title . "\"";
             $institution_type = $_GET['type'];
        $course_offered = CollegeCoursesModel::get();
        
          return view('client.school', array('streams_item'=>$streams_item,'course_item'=>$course_item,'max'=>$max,'min'=>$min,'boardArray'=>$boardArray,'ins_board'=>$ins_board,'courses'=>$courses,'streams'=>$streams,'course_offered'=>$course_offered,'institute' => $institute, 
        'queryString' => $queryString, 'result_count' => $result_count,'stdArray'=>$stdArray, 'institution_type' => $institution_type));
         
}
   
public function first_home_search()
{
    $min=$max="";
     $query = InstituteModel::query();
    $boardArray=array();
    $streams_item=array();
     $course_item=array();
     if (isset($_GET['type']))
     {
          if($_GET['type']=="Schools")
          {
              $type="s";
           
              $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','s')
              ->orderby('board','asc')
              ->get();
                 $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
                $streams=Streams::where('status',1)->orderby('stream','asc')->get();
          }
          else if($_GET['type']=="PU-Junior-College")
          {
              $type="pu";
              $ins_board =DB::table('institute')
          ->select('board')
          ->distinct()
          ->where('type','pu')
          ->orderby('board','asc')
          ->get();
                $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
                $streams=Streams::where('status',1)->orderby('stream','asc')->get();
          }
          else if($_GET['type']=="Polytechnic-College")
          {
              $type="pc";
                 $courses=Courses::where('status',1)->where('type','pc')->orderby('name','asc')->get();
                 $ins_board =DB::table('institute')
          ->select('board')
          ->distinct()
          ->where('type','pc')
          ->orderby('board','asc')
          ->get();
        foreach($courses as $c)
        {
            $course_id[]=$c->id;
        }
          $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
          }
          else if($_GET['type']=="UG-PG-Colleges")
          {
              $type="ug";
              $courses=Courses::where('status',1)->where('type','ug')->orderby('name','asc')->get();
        foreach($courses as $c)
        {
            $course_id[]=$c->id;
        }
          $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
          $ins_board =DB::table('institute')
          ->select('board')
          ->distinct()
          ->where('type','ug')
          ->orderby('board','asc')
          ->get();
          }
        // $query = $query->Where('city', 'like', '%' . $_GET['region'] . '%')
        //     ->orWhere('address', 'like', '%' . $_GET['region'] . '%')
        //     ->orWhere('name', 'like', '%' . $_GET['region'] . '%')
        //     ->orWhere('state', 'like', '%' . $_GET['region'] . '%')
        //     ->where('type',$type);
        //     $nstitute=$query->get();
            
            // 
           $query = InstituteModel::query(); 
            $institute = InstituteModel::
       where('type', '=',$type)
       ->orderBy('premium', 'DESC')->where('enable',1)->where('action',1)->get();
           
            // 
             $result_count = sizeof($institute) ." ". $_GET["type"];
        $queryString = "Showing Search Results For \"" . $_GET['type'] . "\"";
         $institution_type = $_GET["type"];
    $course_offered = CollegeCoursesModel::get();
   $stdArray=array();
    return view('client.school', array('stdArray'=>$stdArray,'streams_item'=>$streams_item,'course_item'=>$course_item,'max'=>$max,'min'=>$min,'boardArray'=>$boardArray,'ins_board'=>$ins_board,'courses'=>$courses,'streams'=>$streams,'course_offered'=>$course_offered,'institute' => $institute, 
    'queryString' => $queryString, 'result_count' => $result_count, 'institution_type' => $institution_type));

    } 
   
}
public function search_reset()
    {
        session()->forget('region');
        return redirect('first_home_search?type='.$_GET['type']);
    }
public function home_search()
    {
        // echo "hi";
        // exit();
        $min=$max="";
         $query = InstituteModel::query();
        $boardArray=array();
        $streams_item=array();
         $course_item=array();
         if (isset($_GET['type']))
         {
              if($_GET['type']=="Schools")
              {
                  $type="s";
               
                  $ins_board =DB::table('institute')
                  ->select('board')
                  ->distinct()
                  ->where('type','s')
                  ->orderby('board','asc')
                  ->get();
                     $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
                    $streams=Streams::where('status',1)->orderby('stream','asc')->get();
              }
              else if($_GET['type']=="PU-Junior-College")
              {
                  $type="pu";
                  $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','pu')
               ->orderby('board','asc')
              ->get();
                    $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
                    $streams=Streams::where('status',1)->orderby('stream','asc')->get();
              }
              else if($_GET['type']=="Polytechnic-College")
              {
                  $type="pc";
                     $courses=Courses::where('status',1)->where('type','pc')->orderby('name','asc')->get();
                     $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','pc')
               ->orderby('board','asc')
              ->get();
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              }
              else if($_GET['type']=="UG-PG-Colleges")
              {
                  $type="ug";
                  $courses=Courses::where('status',1)->where('type','ug')->orderby('name','asc')->get();
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','ug')
                ->orderby('board','asc')
              ->get();
              }
            // $query = $query->Where('city', 'like', '%' . $_GET['region'] . '%')
            //     ->orWhere('address', 'like', '%' . $_GET['region'] . '%')
            //     ->orWhere('name', 'like', '%' . $_GET['region'] . '%')
            //     ->orWhere('state', 'like', '%' . $_GET['region'] . '%')
            //     ->where('type',$type);
            //     $nstitute=$query->get();
                
                // 
               $query = InstituteModel::query(); 
                $institute = InstituteModel::
           where('type', '=',$type)
           ->where(function ($query) {
               $query->Where('city', 'like', '%' . $_GET['region'] . '%')
                     ->orWhere('name', 'like', '%' . $_GET['region'] . '%')
                     ->orWhere('address', 'like', '%' . $_GET['region'] . '%');
           })
           ->orderBy('premium', 'DESC')->where('enable',1)->where('action',1)->get();
               Session::put('region', $_GET['region']); 
                // 
                 $result_count = sizeof($institute) ." ". $_GET["type"];
            $queryString = "Showing Search Results For \"" . $_GET["region"] . "\"";
             $institution_type = $_GET["type"];
        $course_offered = CollegeCoursesModel::get();
       $stdArray=array();
        return view('client.school', array('stdArray'=>$stdArray,'streams_item'=>$streams_item,'course_item'=>$course_item,'max'=>$max,'min'=>$min,'boardArray'=>$boardArray,'ins_board'=>$ins_board,'courses'=>$courses,'streams'=>$streams,'course_offered'=>$course_offered,'institute' => $institute, 
        'queryString' => $queryString, 'result_count' => $result_count, 'institution_type' => $institution_type));
    
        } 
       
    }


    public function search_school()
    {
        
        $region=Session::get('region');
        //print_r($region);exit();
        
       
        $min=$max="";
        $streams_item=array();
        $boardArray=array();
        $course_item=array();
        // $isCollege = !(isset($_GET["type"]) && $_GET["type"] == "schools");

        // if ($isCollege) {
        //     $query = CollegeModel::query();
        //     $query = $query->join('college_courses', 'college.id', '=', 'college_courses.ins_id');
        //     $query = $query->select('*', 'college.id as id');
        // } else {
            $query = InstituteModel::query();
       
        // }

        //<editor-fold desc="Co Ed Filter">
        $co_ed_type = array();
        if (isset($_GET['boys_only'])) {
            $co_ed_type[] = 2;
        }

        if (isset($_GET['girls_only'])) {
            $co_ed_type[] = 3;
        }

        if (isset($_GET['co_education'])) {
            $co_ed_type[] = 1;
        }

        if (sizeof($co_ed_type) >= 1 ) {
            $query = $query->whereIn('d_status', $co_ed_type);
        }
        //</editor-fold>

        //<editor-fold desc="Board Filter">
        $boardArray = array();

        if (isset($_GET['board'])) {
            $boardArray = $_GET['board'];
        }

        

        if (sizeof($boardArray) >= 1) {
           
                $query = $query->whereIn('board',$boardArray);
           
        }
        //</editor-fold>

        //<editor-fold desc="Std Filter">
        $stdArray = array();

        if (isset($_GET['lkg_to_10th'])) {
            $stdArray[] = $_GET['lkg_to_10th'];
        }
        if (isset($_GET['lkg_to_12th'])) {
            $stdArray[] = $_GET['lkg_to_12th'];
        }
        if (isset($_GET['1st_to_10th'])) {
            $stdArray[] = $_GET['1st_to_10th'];
        }
        if (isset($_GET['1st_to_12th'])) {
            $stdArray[] = $_GET['1st_to_12th'];
        }

        if (isset($_GET['stream_ba'])) {
            $stdArray[] = $_GET['stream_ba'];
        }
        if (isset($_GET['stream_bcom'])) {
            $stdArray[] = $_GET['stream_bcom'];
        }
        if (isset($_GET['stream_cc'])) {
            $stdArray[] = $_GET['stream_cc'];
        }
        if (isset($_GET['stream_science'])) {
            $stdArray[] = $_GET['stream_science'];
        }

        if (sizeof($stdArray) >= 1) {
          
                $query = $query->whereIn('c_offered', $stdArray);
           
        }
        //</editor-fold>

        //<editor-fold desc="Type Of School">
        $typeOfSchool = array();

        if (isset($_GET['is_residential'])) {
            $typeOfSchool[] = $_GET['is_residential'];
        }
        if (isset($_GET['is_non_residential'])) {
            $typeOfSchool[] = $_GET['is_non_residential'];
        }

        if (sizeof($typeOfSchool) >= 1) {
            
            
                $query = $query->whereIn('c_type', $typeOfSchool);
           
           
        }
        
        
         
        //</editor-fold>

        //<editor-fold desc="Fees Range">
        if (isset($_GET['fees_min'])) {
           
            if(($_GET['fees_min']!="")&&($_GET['fees_max']!=""))
            {
                //  echo"hxi";exit();
                $min=$_GET['fees_min'];
                $max=$_GET['fees_max'];
          // exit();
            //   $query->where('action',1)
            //     ->where(function ($query) {
            //   $query->where('cost', '>=', $_GET['fees_min']  )
            //           ->where('cost', '<=', $_GET['fees_max'] );
            // $query->where('cost', '>=',  $_GET['fees_min'])
      //$query->where('max_cost', '<=', $_GET['fees_max']);
                   $query->where(function ($query) {
               $query->where('cost', '>=',  $_GET['fees_min'])
                     ->where('max_cost', '<=', $_GET['fees_max']);
                     
           });
           
            }
                
        }
        
       if($_GET['type']=="Schools") 
       {
         
            $query = $query->where('type', '=', 's');
            $streams=Streams::where('status',1)->orderby('stream','asc')->get();
            $courses=Courses::where('status',1)->orderby('name','asc')->get();
          
           
                    $ins_board =DB::table('institute')
                    ->select('board')
                    ->distinct()
                    ->where('type','s')
                      ->orderby('board','asc')
                    ->get();
       }
       if($_GET['type']=="PU-Junior-College")
       {
            $query = $query->where('type', '=', 'pu')->where('action',1);
           
            $courses=Courses::where('status',1)->where('type','pu')->orderby('name','asc')->get();
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
             $streams=Streams::where('status',1)->orderby('stream','asc')->get();
             $ins_board =DB::table('institute')
             ->select('board')
             ->distinct()
             ->where('type','pu')
               ->orderby('board','asc')
             ->get();
       }
       if($_GET['type']=="Polytechnic-College")
       {
           $query = $query->where('type', '=', 'pc')->where('action',1);
          
            
              $courses=Courses::where('status',1)->where('type','pc')->orderby('name','asc')->get();
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','pc')
                ->orderby('board','asc')
              ->get();
       }
       if($_GET['type']=="UG-PG-Colleges")
       {
           $query = $query->where('type', '=', 'ug')->where('action',1);
           $courses=Courses::where('status',1)->where('type','ug')->orderby('name','asc')->get();
        //   print_r($courses);die;
            foreach($courses as $c)
            {
                $course_id[]=$c->id;
            }
            
              $streams=Streams::whereIn('course_id',$course_id)->orderby('stream','asc')->where('status',1)->get();
              $ins_board =DB::table('institute')
              ->select('board')
              ->distinct()
              ->where('type','ug')
                ->orderby('board','asc')
              ->get();
       }
         
         
         
         
         if(!empty($region))
        {
        //    $query = $query->where(function ($query) {
        //     $query->Where('city', 'like', '%' . $region . '%')
        //         ->orWhere('address', 'like', '%' . $region . '%')
        //         ->orWhere('name', 'like', '%' . $region . '%');
        //     });
            $queryString = "Showing Search Results For \"" . $region . "\"";

            $_GET['location']=$region;
            $query->where(function ($query) {
                $query->Where('city', 'like', '%' . $_GET['location'] . '%')
                      ->orWhere('name', 'like', '%' . $_GET['location'] . '%')
                      ->orWhere('address', 'like', '%' . $_GET['location'] . '%');
            });

              // print_r($region);exit();
            //    $region="cana";
            // $query = $query ->where(function ($query) {
            //     $query->Where('city', 'like', '%'.$region.'%')
            //           ->orWhere('name', 'like', '%'.$region.'%')
            //           ->orWhere('address', 'like', '%'.$region.'%');
            // });
        }
        
       else {
           
           
                $queryString = "Search ".$_GET['type'];
          
          
        }
        $ins_id=array();
if(isset($_GET['course']))
{
    
     $course_item=$_GET['course'];
    // print_r($courses);exit();
      $course_offered = CollegeCoursesModel::whereIn('course_id',$_GET['course'])->get();
     foreach($course_offered as $c)
     {
         $ins_id[]=$c->ins_id;
     }
     if (sizeof( $ins_id) >= 1) {
      $query = $query->whereIn('id', $ins_id);
     }
}
if(isset($_GET['streams']))
{
    
    $streams_item=$_GET['streams'];
    // print_r($courses);exit();
      $course_offered = CollegeCoursesModel::whereIn('stream_id',$_GET['streams'])->get();
     foreach($course_offered as $c)
     {
         $ins_id[]=$c->ins_id;
     }
     if (sizeof( $ins_id) >= 1) {
      $query = $query->whereIn('id', $ins_id);
     }
}


        $totalResults = $query->count();
        $query->limit(100);
        $institute = $query->orderBy('premium', 'DESC')->where('enable',1)->where('action',1)->get();
        // if ($isCollege) {
        //     $result_count = sizeof($institute) . " Colleges";
        // } else {
            $result_count = sizeof($institute) ." ". $_GET["type"];
        // }
        $institution_type = $_GET["type"];
        $course_offered = CollegeCoursesModel::get();
       //print_r($institution_type);exit();
        return view('client.school', array('stdArray'=>$stdArray,'streams_item'=>$streams_item,'course_item'=>$course_item,'max'=>$max,'min'=>$min,'boardArray'=>$boardArray,'ins_board'=>$ins_board,'courses'=>$courses,
        'streams'=>$streams,'course_offered'=>$course_offered,'institute' => $institute, 
        'queryString' => $queryString, 'result_count' => $result_count, 'institution_type' => $institution_type));
    }
}
