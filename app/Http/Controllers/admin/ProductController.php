<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Maincategory;
use App\Models\Product;
use App\Models\Productdetails;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $main_categories = Maincategory::orderBy('id','desc')->get(); 
        $product_details = Productdetails::orderBy('id','asc')->get();
        
        return view('admin.products.create',compact('main_categories','product_details'));
    }

    public function fetchCategory(Request $request)

    {

        $data['categories'] = Category::where("main_cat_id", $request->main_category_id)
                                ->get(["name", "id"]);

  

        return response()->json($data);

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function fetchSubCategory(Request $request)

    {

        $data['subcategories'] = Subcategory::where("cat_id", $request->category_id)
                                    ->get(["sub_name", "id"]);

                                      

        return response()->json($data);

    }
    
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $productSpecifications = ProductSpecification::where('product_id',$id)->get();
        $productImages = ProductImage::where('product_id',$id)->get();
        $main_categories = Maincategory::orderBy('id','desc')->get(); 
        $product_details = Productdetails::orderBy('id','asc')->get();
        return view('admin.products.edit',compact('main_categories','product_details','product','productSpecifications','productImages'));
    }


    public function saveProducts(Request $request)
    {
        $valid = [
           
            'category_id'   => 'required',
            'main_category_id'   => 'required',
            'sub_category_id'   => 'required',

        ];
        $input = $request->all();

        $productid =  $input['product_id'];
        if (!$productid) {
            $valid['default_image'] = 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
          
            $valid['default_image'] = 'file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
        }
        $this->validate($request, $valid);

        if (!$productid) {
          
            if ($request->hasfile('default_image')) {
    
                $file= $request->file('default_image');
                $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
                $extension = $file->getClientOriginalExtension(); // Get the original file extension
                // $filename = $uniqueNumber . '.' . $extension;
            
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(('public/images/products'),$filename);
            }

            $input['image'] = $filename;
            $product=Product::create($input);
              
        } else {

            $product = Product::where('id',$productid)->first();
            if ($request->hasfile('default_image')) {

                $file= $request->file('default_image');
                $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
                $extension = $file->getClientOriginalExtension(); // Get the original file extension
                // $filename = $uniqueNumber . '.' . $extension;
            
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(('public/images/products'),$filename);
            } else {
                $filename = $product->image;
            }
            $input['image'] = $filename;
            $product->update($input);

        }

        return response()->json([
            'data' => $product->id
        ]);
  
       

    }
    public function saveSpecifications(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure product exists
            'product_detail_id' => 'required|exists:product_details,id', // Ensure product detail exists
            // Ensure that the combination of product_id and product_detail_id is unique
            'product_detail_id' => 'unique:product_specifications,product_detail_id,NULL,NULL,product_id,' . $request->product_id,
            'value'    => 'required',

        ]);
        $input = $request->all();
        $input = Arr::except($input, array('_token'));
        $product_specification = ProductSpecification::create($input);
        return response()->json([
            'data'                => $product_specification,
            'product_detail_name' => $product_specification->product_detail->name,
        
        ]);
  

    }


    public function deleteSpecification($id)
    {
       $product_specification = ProductSpecification::find($id);
       $product_specification->delete();
        return response()->json([
            'data' => true
        ]);

    }

    public function galleryImageStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation
        ]);
        $input = $request->all();
        $input = Arr::except($input, array('_token'));
        if ($request->hasfile('image')) {

            $file= $request->file('image');
            $uniqueNumber =date('YmdHi'); // Generates a unique ID based on the current time in microseconds
            $extension = $file->getClientOriginalExtension(); // Get the original file extension
            // $filename = $uniqueNumber . '.' . $extension;
        
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(('public/images/products/gallery'),$filename);
        } 
        $input['image'] = $filename;
        $image=ProductImage::create($input);
        return response()->json([
            'status' => 200,
            'image_id' => $image->id,  // Return the image ID
            'image_path' =>  asset('public/images/products/gallery/' . $image->image),  // Return the URL of the image
        ]);
    }

    public function galleryImageDelete($id)
    {
      

        // Find the image record by ID
        $image = ProductImage::find($id);
        $imagePath = public_path('images/products/gallery/' . $image->image); 

        // Optionally delete the image file from storage
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the file
         
        }
        

        // Delete the record from the database
        $image->delete();

        // Return success response
        return response()->json([
            'status' => 200,
            'message' => 'Image deleted successfully'
        ]);

    }

    public function changeStatus($id,Request $request)
    {
        //
        $input = $request->all();
        $product = Product::find($id);
        $product->status= $input['status'];
        $product->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Changed Successfully'
        ], 200); //
         
    }

    public function destroy($id)
    {
        $product_images = ProductImage::where('product_id',$id)->get();
        foreach($product_images as $product_image)
        {
            $imageGalleryPath = public_path('images/products/gallery/' . $product_image->image); 
            if (file_exists($imageGalleryPath)) {
                unlink($imageGalleryPath); // Delete the file
             
            }
        }
        $product = Product::find($id);
        $imagePath = public_path('images/products/' . $product->image); 
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the file
         
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');

    }



}
