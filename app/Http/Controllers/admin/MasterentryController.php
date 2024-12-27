<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Productdetails;
use App\Models\Maincategory;
use App\Models\Subcategory;
use DB;
use Exception;
class MasterentryController extends Controller
{

    public function __construct()
{
    $this->middleware('admin');
}
//COURSES
public function product_details()
{
      $category=Productdetails::All();
      $courses=Productdetails::paginate(25);
      $title = 'All Listings';
      return view('admin.productdetails.productdetails',compact('title','courses','category'));
}

public function Main_category()
  {
      $category=Maincategory::All();
      $courses=Maincategory::paginate(25);
      $title = 'All Listings';
      return view('admin.maincategory.maincategory',compact('title','courses','category'));
  }
  public function category()
  {
      $category=Category::All();
      $maincategory=Maincategory::All();
      $courses=Category::paginate(25);
      $title = 'All Listings';
      return view('admin.categorynew.index',compact('title','courses','category','maincategory'));
  }
  
  public function product_deta_search()
{
  if(isset($_GET['submit']))
  {
    return redirect('product_details');
  }
          $Productdetails=Productdetails::query();
          if($_GET['type'])
          {
           
            $courses= $Productdetails->Where('name', 'like', '%' . $_GET['type'] . '%');
          }
       
          $category=Productdetails::All();
          $courses=$courses->paginate(25);
          $courses=$courses->appends(['name'=>$_GET['type']]);
          $title = 'All Listings';
          return view('admin.productdetails.productdetails',compact('courses','title','category'));
}
   public function course_search()
{
  if(isset($_GET['submit']))
  {
    return redirect('category');
  }
          $courses=Category::query();
          if($_GET['type'])
          {
           
            $courses= $courses->Where('name', 'like', '%' . $_GET['type'] . '%');
          }
       
          $category=Category::All();
          $courses=$courses->paginate(25);
          $courses=$courses->appends(['name'=>$_GET['type']]);
          $title = 'All Listings';
          return view('admin.categorynew.index',compact('courses','title','category'));
}
 public function coursesstatus(Request $request)
    {
        if($request->cat=='main')
        {
            $courses = Maincategory::find($request->id);
        }
        else
        {
            $courses = Category::find($request->id);
        }
      
      $courses->status = $request->status;
      $courses->save();
    }
    public function product_det_store(Request $request)
  {
            $centreaddarray = array(
              'name'=>$request->title,
              'caption'=>$request->caption,
              'status'=>1,
              'order_by'=>$request->order,
              
          ); 
          $courses = Productdetails::create($centreaddarray);
   $alert = ['success','Added successfully'];
     return back()->withAlert($alert);
          
  }
 public function maincat_store(Request $request)
  {
  
  $customMessages = [
            'image.required' => 'You must upload an image.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
  $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);
  if($request->file('image'))
    {
        $file= $request->file('image');
        $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
        $extension = $request->image->getClientOriginalExtension(); // Get the original file extension
        // $filename = $uniqueNumber . '.' . $extension;
    
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(('public/images/category'),$filename);

    }
    // print_r($_POST);exit;
    $centreaddarray = array(
      'name'=>$request->name,
      'caption'=>$request->caption,
      'status'=>1,
      'order_by'=>$request->order,
      'image'=>$filename
  );
   $courses = Maincategory::create($centreaddarray);
   $alert = ['success','Added successfully'];
     return back()->withAlert($alert);
  }
  public function courses_store(Request $request)
  {
  
  $customMessages = [
            'image.required' => 'You must upload an image.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
  $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);
  if($request->file('image'))
    {
        $file= $request->file('image');
        $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
        $extension = $request->image->getClientOriginalExtension(); // Get the original file extension
        // $filename = $uniqueNumber . '.' . $extension;
    
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(('public/images/category'),$filename);

    }
    $centreaddarray = array(
      'name'=>$request->name,
      'status'=>1,
      'image'=>$filename
  );
   $courses = Category::create($centreaddarray);
   $alert = ['success','Added successfully'];
     return back()->withAlert($alert);
  }

  
  public function courses_edit($id)
  {

    // echo"hi";
    // exit();
        $courses=Courses::find($id);

       return view('admin.courses.edit', compact('courses'));
  }


  public function courses_update(Request $request)
  {
   
   $id=$request->id;
     $prop=Category::find($id);
// $request->validate([
//         'image' => [
//             'required',
//             'image',
//             'mimes:jpeg,png,jpg,gif,svg',
//             'max:2048', // Maximum file size in kilobytes
//             'dimensions:min_width=100,min_height=200,max_width=3000,max_height=3000' // Optional dimensions constraint
//         ],
//     ]);
  if($request->file('image'))
    {
        $customMessages = [
            'image.required' => 'You must upload an image.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];

        // Validate the image with custom messages
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);
        // echo"hi";exit;
        $file= $request->file('image');
        $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
        $extension = $request->image->getClientOriginalExtension(); // Get the original file extension
        // $filename = $uniqueNumber . '.' . $extension;
    
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(('public/images/category'),$filename);
$prop->image  =$filename;
    }
     
     
     $prop->name=$request->name;
     $prop->save();

    $alert = ['success','Updated successfully'];
    return back()->withAlert($alert);
  
  }
  public function pro_detail_update(Request $request)
  {
    $id=$request->id;
    $prop=Productdetails::find($id);
    $centreaddarray = array(
      'name'=>$request->name,
      'order_by'=>$request->order,  
  ); 
  $prod_det= Productdetails::where('id',$id)->update($centreaddarray);
  $alert = ['success','Added successfully'];
  return back()->withAlert($alert);
  }
  
public function maincat_update(Request $request)
  {
   
     $id=$request->id;
     $prop=Maincategory::find($id);
// $request->validate([
//         'image' => [
//             'required',
//             'image',
//             'mimes:jpeg,png,jpg,gif,svg',
//             'max:2048', // Maximum file size in kilobytes
//             'dimensions:min_width=100,min_height=200,max_width=3000,max_height=3000' // Optional dimensions constraint
//         ],
//     ]);
  if($request->file('image'))
    {
        $customMessages = [
            'image.required' => 'You must upload an image.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];

        // Validate the image with custom messages
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);
        // echo"hi";exit;
        $file= $request->file('image');
        $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
        $extension = $request->image->getClientOriginalExtension(); // Get the original file extension
        // $filename = $uniqueNumber . '.' . $extension;
    
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(('public/images/category'),$filename);
          $prop->image  =$filename;
    }
     
     $prop->order_by=$request->order;
     $prop->name=$request->name;
     $prop->caption=$request->caption;
     $prop->save();

    $alert = ['success','Updated successfully'];
    return back()->withAlert($alert);
  
  }


  public function courses_destroy(Courses $courses, $id)
  {
   //echo"hi";exit();
    $courses=Courses::find($id);
    $courses->delete();

  $alert = ['success','Deleted successfully'];
  return back()->withAlert($alert);   
  }   


 

  

    //Subcategory
    public function Subcategory()
    {
         try 
         {
            
            $category = Category::where('status', 1)->get();
            $Subcategory=Subcategory::paginate(25);
            $title = 'All Listings';
            // echo"jsi";exit;
            return view('admin.Subcategory.index',compact('title','Subcategory','category'));
         }
         catch (Exception $e) 
         {
     
                      $alert = ['success','Something Went Wrong'];
                      return back()->withAlert($alert); 
          }
    }

    public function streams_store(Request $request)
    {
         try 
         {
           
                $centreaddarray = array(
                    'cat_id'=>$request->course,
                    'sub_name'=>$request->stream,
                    'status'=>1,
                );
                 $Subcategory = Subcategory::create($centreaddarray);
                 $alert = ['success','Added successfully'];
                   return back()->withAlert($alert);
         }
         catch (Exception $e) 
         {
             echo"ji";exit;
                      $alert = ['success','Something Went Wrong'];
                      return back()->withAlert($alert); 
          }
    }

    public function streams_edit($id)
    {
      $courses = Courses::get();
      $streams = Streams::find($id);
      return view('admin.streams.edit', compact('courses','streams'));
    }

    public function streams_update(Request $request, Subcategory $Subcategory)
    {
        try
        {
         $id=$_POST['id'];
         $prop=Subcategory::find($id);

             $prop->cat_id = $request->input('cat_id');
             $prop->sub_name = $request->input('stream');
  
   
     $prop->save();
        $alert = ['success','Updated successfully'];
       return back()->withAlert($alert);
        }
       catch (Exception $e) 
         {
             echo"ji";exit;
                      $alert = ['success','Something Went Wrong'];
                      return back()->withAlert($alert); 
          }
    }
    
    public function streams_destroy($id)
    {
      $streams=Streams::find($id);
      $streams->delete();
      $alert = ['success','Deleted successfully'];
      return back()->withAlert($alert);   
    }


    public function streamsstatus(Request $request)
    {
      $streams = Streams::find($request->id);
      $streams->status = $request->status;
      $streams->save();
    }
    
  
   


 public function stream_search()
{
  if(isset($_GET['submit']))
  {
    return redirect('streams');
  }
           $courses=Courses::get();
          $streams=Streams::query();
          if($_GET['type']==1)
          {
           
            $streams= $streams->Where('stream', 'like', '%' . $_GET['keyword'] . '%');
           
          }
       
         
          $streams=$streams->paginate(25);
          $streams=$streams->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
          return view('admin.streams.index',compact('streams','title','courses'));
}
   
   

 }
