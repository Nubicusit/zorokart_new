<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
    	//$properties = Property::orderBy('id','desc')->paginate(20);
    	$title = 'All Listings';
    	return view('admin.category.index',compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   $filename=0;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(('assets/catagory/'),$filename);
            
        }
         $centreaddarray = array(
            'name' => $request->name,
             'status' =>  $request->status,
               'image' =>   $filename,
                );
       $insertdata = DB::table('categories')->insert($centreaddarray);
     return redirect()->route('category.index')
             ->with('success', 'category added successfully');
    }
    
    public function edit(Category $category)
    {
         return view('admin.category.edit', compact('category'));
    }

 
    public function update(Request $request,Category $category)
    {
         $id=$category->id;
        // exit();
        $prop=Category::where('id',$id)->first();
        //  print_r($prop);exit();
        $filename=$prop->image;
        if($request->file('image')){
            if(!empty($prop->image))
        {
         unlink('assets/catagory/'.$prop->image);
        }
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(('assets/catagory/'),$filename);
            
        }
        
      $centreaddarray = array(
            'name' => $request->name,
             'status' =>  $request->status,
               'image' =>   $filename,
                );
       $homepagebanner =  DB::table('categories')->where('id',$id)->update($centreaddarray);
        return redirect()->route('category.index')
            ->with('success', 'category  Updated successfully');
    }

 
  
    public function show(Category $category)
    {
          $id=$category->id;
        //  exit();
        $prop=Category::where('id',$id)->first();
        // print_r($prop);exit();
       
            if(!empty($prop->image))
        {
         unlink('assets/catagory/'.$prop->image);
        }
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'property  deleted successfully');
    }
    
    public function destroy(Category $category)
    {
        echo"ds";exit();
      $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'property  deleted successfully');   
    }
}
