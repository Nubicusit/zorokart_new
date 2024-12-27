<?php
namespace App\Http\Controllers;
use  \Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Mail\Notify\Schoolspe;
use App\Models\SettingsModel;
use Mail;
use Auth;

class SiteController extends Controller
{
    
    public function index()
    {
        // // echo"hi";
        // // exit();
        //   $institute=InstituteModel::limit('9')->where('premium',1)->where('enable',1)->get();
        
        // $blogs=BlogsModel::limit('3')->orderby('id','desc')->where('status',1)->get();
        return view('home/home');
    }
    public function user_login()
    {
        return view('home/user_signup');
    }
    public function signin()
    {
        return view('home/user_login');  
    }
    public function profile1()
    {
        $institution=array();
         $settings=SettingsModel::first();
          return view('institute.profile1',compact('institution','settings'));
    }
    public function institute(Request $request)
    {
        return view('client.institute');
    }
    public function index1()
    {
        $settings=SettingsModel::first();
        return view('institute.index1',compact('settings'));
    }
 
}

