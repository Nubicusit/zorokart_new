<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogsModel;
use DB;
use HTMLPurifier;

class BlogsController extends Controller
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

  public function blogs()
  {
      $blogs=BlogsModel::orderby('id','desc')->get();
      $title = 'All Listings';
      return view('admin.blogs.index',compact('title','blogs'));
  }


  public function blogs_store(Request $request)
 {
       $purifier = new HTMLPurifier();
      $content = $purifier->purify($request->content);
    if($request->file('image'))
    {
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(('public/images/blogs'),$filename);

    }
      $centreaddarray = array(
      'heading'=>$request->heading,
      'author'=>$request->author,
      'date'=>$request->date,
      'key_description'=>$request->key_description,
      'content'=>$content,
     
      'status'=>1,
      'image' => $filename,
      'status'=>1,
      );

    $blogs = BlogsModel::create($centreaddarray);
    $alert = ['success','Added successfully'];
    return back()->withAlert($alert);
  }



  public function blogs_edit($id)
  {
    $blogs=BlogsModel::find($id);
    return view('admin.blogs.edit', compact('blogs'));
  }


  public function blogs_update(Request $request)
  {
        $purifier = new HTMLPurifier();
      $content = $purifier->purify($request->content);
     // $filename="";
       $id=$_POST['id'];
       $prop=BlogsModel::find($id);
  //  print_r($prop);
  //  exit();

      if($request->file('image'))
      {
        if(!empty($prop->image))
        {
         unlink('public/images/blogs/'.$prop->image);
        }
          $file= $request->file('image');
          $filename= date('YmdHi').$file->getClientOriginalName();
          $file->move(('public/images/blogs/'),$filename);

      }
       
       
    //     if ($request->file('image')) {

    //   $file = $request->file('image');
    //   $filename = date('YmdHi') . $file->getClientOriginalName();

    //   $file->move(('public/images/blogs/'), $filename);
    // }
    
    else
    {
       if(!empty($prop->image))
        {
            $filename =$prop->image;
        }
        else{
        
        $filename = 0;
        }
    }

   $prop->heading = $request->input('heading');
   $prop->author = $request->input('author');
   $prop->date = $request->input('date');
    $prop->key_description = $request->input('key_description');
   $prop->content = $content;
  
   $prop->image = $filename;

   $prop->save();
      $alert = ['success','Updated successfully'];
     return back()->withAlert($alert);
  }



  public function blogs_destroy($id)
  {
    $blogs=BlogsModel::find($id);
    $blogs->delete();
    $alert = ['success','Deleted successfully'];
    return back()->withAlert($alert);
  }


  public function blogsstatus(Request $request)
    {
      $blogs = BlogsModel::find($request->id);
      $blogs->status = $request->status;
      $blogs->save();
    }
    
    
    public function blogs_search()
 {
  if(isset($_GET['reset']))
  {
    return redirect('blogs');
  }
$query = BlogsModel::query();

          
          if($_GET['type']==1)
          {
            //   echo "hi";
            //   exit();
          
            $query= $query->Where('heading', 'like', '%' . trim($_GET['keyword']). '%');
           
          }
          else if($_GET['type']==2)
          {
                
            $query= $query->Where('author', 'like', '%' . trim($_GET['keyword']). '%');
          }
          
       
            else 
          {
            $query= $query->Where('date', 'like', '%' . trim($_GET['keyword']). '%');
            
          }
          $keyword=$_GET['keyword'];
          $type=$_GET['type'];
        
          $blogs=$query->paginate(25);
          $blogs=$blogs->appends(['type'=>$_GET['type'],'keyword'=>$_GET['keyword']]);
          $title = 'All Listings';
           if(isset($_GET['export']))
   {
    
      return Excel::download(new Advanceleadexport, 'invoices.xlsx');
  }
          return view('admin.blogs.index',compact('blogs','title','keyword','type'));
}



}
