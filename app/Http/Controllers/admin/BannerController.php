<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Maincategory;
use Exception;
use DB;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $input = $request->all();
        $categories=Maincategory::all();
        $query = Banner::join('main_category as mc', 'banners.main_category_id', '=', 'mc.id')
                ->select('banners.*', 'mc.name');
        
        if (isset($input['category_id']) && trim($input['category_id'])) {

            $query->where('banners.main_category_id', '=', trim($input['category_id']));
        }
        
        $banners = $query->orderBy('banners.id', 'DESC')
                    ->paginate(25)->appends(request()->query());
        $title = 'Banners';
        return view('admin.banners.index', compact('banners', 'input', 'categories', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
  


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $customMessages = [
            'banner_image.required' => 'You must upload an image.',
            'banner_image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'banner_image.mimes' => 'Only jpeg, png, jpg, and gif image types are allowed.',
            'banner_image.max' => 'The image size must not exceed 2MB.',
        ];

        $request->validate([
                    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ], $customMessages);

        $input = $request->all();
 

        if($request->file('banner_image'))
            {
                $file= $request->file('banner_image');
                $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
                $extension = $file->getClientOriginalExtension(); // Get the original file extension
                // $filename = $uniqueNumber . '.' . $extension;
            
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(('public/images/banners'),$filename);

            }
        $input['banner_image'] = $filename;
        Banner::create($input);
        $alert = ['success','Added successfully'];
            return back()->withAlert($alert);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $id=$request->id;
            $banner=Banner::find($id);
    
          // Validate the image with custom messages
           $request->validate([
               'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);
           $input = $request->all();

           if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
                    $file= $request->file('banner_image');
                    $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
                    $extension = $file->getClientOriginalExtension(); // Get the original file extension
                    // $filename = $uniqueNumber . '.' . $extension;
                
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file->move(('public/images/banners'),$filename);
                    $input['banner_image']  = $filename;
                    
          } else {
            $input['banner_image'] = $banner->banner_image;
          }
        
       $banner->update($input);
   
       $alert = ['success','Updated successfully'];
       return back()->withAlert($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banner=Banner::find($id);
        $banner->delete();
        $alert = ['success','Deleted successfully'];
        return back()->withAlert($alert); 

    }

    public function changeStatus($id,Request $request)
    {
        //
        $input = $request->all();
        $banner = Banner::find($id);
        $banner->status= $input['status'];
        $banner->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Changed Successfully'
        ], 200); //
         
    }


}
