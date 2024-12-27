<?php
namespace App\Http\Controllers;
use App\Models\CatalogModel;
use App\Models\CollegeModel;
use App\Models\Courses;
use App\Models\InstituteModel;
use App\Models\PropertyRequest;
use App\Models\Subcategory;
use App\Models\UserparentModel;
use App\Models\User;
use App\Rules\MatchOldPassword;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\AuthEmail\Schoolspe;
use Mail;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function customLogin2(Request $request)
    {
        echo "client";
        exit();
        if (session('user')) {

            $data = $leagues = DB::table('requested_lists')
                ->select('*')
                ->join('property_request', 'property_request.email', '=', 'requested_lists.user_email')
                ->join('properties', 'properties.id', '=', 'requested_lists.property_id')
                ->where('requested_lists.status', 1)
                ->where('requested_lists.user_email', session('email'))
                ->get();
            $user = PropertyRequest::where('email', session('user'))
                ->where('password', md5(session('pass')))->first();
            // print_r($user);exit();
            return view('client.dashboard_client', compact('data', 'user'));
        }
    }

   


public function customLogin(Request $request)
{
         //print_r($_POST);exit();

        // echo "hi";
        // exit();

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        // print_r( $credentials);
        // exit();

        if (Auth::attempt($credentials)) {


            // var_dump($user);
            $user = auth()->user();

            if ($user->role == 1) {

                // echo"h1jh";exit();

                return redirect()->intended('dashboard')
                    ->withSuccess('Signed in');
            } else if ($user->role == 2) {
                echo "2";
                exit();
                return view('client.my_account', compact('user'));
            } else if ($user->role == 4) {
                // echo"4";exit();
                $institution_registration = InstituteModel::
                join('users', 'institute.user_id', '=', 'users.id')
                    ->select('*', 'users.id as id')
                    ->where('users.id', Auth::user()->id)
                    ->first();
                //  print_r($institution_registration);exit();
                $title = 'All Listings';

                return view('institute.profile1', compact('institution_registration', 'user'));
                // return view('institute.profile1',compact('user'));
            } else {

            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function admin_login(Request $request)
    {
//echo"admin login";exit();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        // print_r( $credentials);
        // exit();
        if (Auth::guard('admin')->attempt($credentials)) 
        {
        // if (auth()->guard('admin')->attempt($credentials)) {
           //echo"ddd";exit();
            $user = auth()->guard('admin')->user();
         //  print_r($user);die;

            return view('admin.dashboard');
            
        }
         else
        {
            return back()->with('success', 'Invalid user name or password-outside');
        }
    }

    public function ins_login(Request $request)
    {
    //    echo "hi";
    //    exit();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        
        // print_r($credentials);
        // exit();

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->status == 1) {
                // print_r($user);exit();
        // echo "hi";
        // exit();
                // if ($user->email_verified == 0) {
                //         return view('client.ins_type');
                //      }
            //     $institution = InstituteModel::
            //     join('users','institute.user_id', '=', 'users.id')
            //         ->select('*', 'institute.id as id')
            //         ->where('users.id', Auth::user()->id)
            //         ->first();
            //       //  print_r($institution);exit();
            //    if(!$institution)
            //    {
            //         return back()->with('success', 'Institution not registered');
            //    }

                
                $title = 'All Listings';
                return redirect('profile1')->withSuccess('Login details are not valid');
               //  return view('institute.profile1',compact('institution','user'));
            } else {
                return back()->with('success', 'Your account is inactive, please contact Schoolspe');
            }
        } else {
            return back()->with('success', 'Invalid user name or password');
        }
    }

    public function registration()
    {
        return view('client.registration');
    }

    public function customRegistration(Request $request)
    {
//         $customMessages = [
//             'name.required' => 'You must upload an image.',
//             'email.required' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
//             'password.required' => 'Only jpeg, png, jpg, and gif image types are allowed.',
//             'phone.required' => 'The image size must not exceed 2MB.',
//             'password_confirmation.required|same:password' => 'The image size must not exceed 2MB.',
//         ];
//   $request->validate([
//             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ], $customMessages);
//echo"ji";exit();
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'phone' => 'required|min:10',
        //     // 'image'=>'required',
        //     // 'address'=>'required',
        //     'password_confirmation' => 'required|same:password',


        // ]);
        $email = $request->email;
        // $pass= bin2hex(random_bytes(6));
        $pass=$request->password;
        //$pass = "123";
        $user = User::where('email', $request->email)->first();

        if($user)
        {

             return back()->with('success','Account already exist, kindly login to proceed');
        }
        // else{
        //     $centre =  DB::table('property_request')
        //->where('email', $email)->update(array('password' =>md5($pass)));

        // $host = request()->getHttpHost();

        // $msg = "<h3 style='color:black'><i>Thank you for signing up..!</i></h3>";
        // $msg .= "<p style='color:#000'><i>Login and List your Institute using the below Credentials.</i></p>";
        
        // $msg .= "<div class='card'>
        //   <div class='card-body'>
        //   <h4>Username:&nbsp;" . $email . "</h4><h4>Password:&nbsp;" . $pass . "</h4>
             
        //   </div>
        //   </div>";
        // $msg .= "<h5 style='color:black'>PS : If you did not sign-up for SchoolsPe please ignore this email. <br> For any queries you can reach us on +91 8431367561 or write to us at 
        // <a href='support@schoolspe.com'>support@schoolspe.com.</a></h5>";
        //  $msg .= "<p style='color:#000'>To login please &nbsp;<a href='".$host."/institute'>Click Here</a></p>";
        //  $msg .= "<h3 style='color:black'>Team SchoolsPe</h3>";
        
        // $img = "https://schoolspe.in/public/images/logo.png";
        // $msg .= "<img src='https://schoolspe.in/public/images/logo.png' height='41px' width='216px'>";
    
     
      
        // $sender = 'info@schoolspe.com';
        // $recipient = $email;
        // $subject = "Welcome to SchoolsPe...!!!";
        // $headers = "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        // $headers .= 'reply-to:info@schoolspe.com' . "\r\n";
        // $headers .= 'Cc:info@schoolspe.com' . "\r\n";
        // $headers .= 'From:' . $sender;
        // $returnpath = '-f info@schoolspe.com';


        $data = $request->all();
        $data['password'] = bcrypt($pass);
        $check = $this->create($data);
        $ms[0]=$email;
        $ms[1]=$pass;
        
    //     Mail::to('info@schoolspe.com')->send(new Schoolspe($ms));
    //    Mail::to($email)->send(new Schoolspe($ms));


        return back()->with('success', 'Kindly use the login credentials which are sent to your mail to login. Thank you for signing up');
    }

    public function create(array $data)
    {
        // echo"hi";
        // exit();
        return User::insert([
            'user_name' => trim($data['name']),
            'email' => trim($data['email']),
            'user_phone' => trim($data['phone']),
            'status'=>1,
            'role' => 4,
            'password' =>trim( $data['password']),
            'created_at'=>date('Y-m-d')
        ]);
    }

    public function dashboard()
    {
        echo"dfd";exit();
        
            return view('admin.dashboard');
       
    }

    public function contact(Request $request)
    {
//         // print_r($_POST);EXIT();
//         $msg = "<h3 style='color:green'>GrameenaRuchi</h3>";
//         $img = "https://silqen.in/GrameenaRuchi/public/images/logo.png";
//         $msg .= "<img src='https://jobahcri.com/assets/images/logo/logo.png' height='100px' width='350px'>";
//         $msg .= "<div class='card'>
//       <div class='card-body'>
//       <h4>Name:" . $request->name . "</h4><h4>Email:" . $request->email . "</h4><h4>Mobile number:" . $request->mob . "</h4><h4>message:" . $request->msg . "</h4>
//       </div>
//       </div><br>";


//         $sender = 'gr@gmail.com';
//         $recipient = 'gr@gmail.com,' . $request->email;
//         $subject = "Grameena Ruchi contact form submission";
//         $headers = "MIME-Version: 1.0\r\n";
//         $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//         $headers .= 'From:' . $sender;


// // send email
       // mail($recipient, $subject, $msg, $headers);
        return redirect()->route('contact_us')->with('success', 'contact form submitted successfully!');
    }

    public function what_we_Do()
    {
        return view('client.what_we_Do');
    }

    public function dashboard_client()
    {
        return view('client.dashboard_client');
    }
public function institution_logout()
    {
       
        Auth::logout();

        return Redirect('institute');
    }
    public function admin_logout()
    {
       
        Auth::guard('admin')->logout();
        return Redirect('institute');
    }
  public function parent_logout()
 {
        
        Auth::guard('parent')->logout();
        return Redirect('/');
 }
 
    public function get_otp(Request $data)
    {
      // print_r($data);die;
       $otp=trim($data['one']).trim($data['two']).trim($data['three']).trim($data['four']);
       $session_otp=Session::get('otp');
     $otp; echo"<br>";
      $session_otp;
      // exit();
   $phone=$_POST['otp_phone'];
 //  exit();
        $parentuser=UserparentModel::where('phone',$phone)->first();
if($parentuser)
 {
       if($otp==$session_otp)
       {
           $credentials=array("email"=> $parentuser->email,"password"=>123);
                                 if (Auth::guard('parent')->attempt($credentials)) 
                            {
                                return back()->with('status', 'Logged In Successfully.');
        //   return redirect('my_account_details') ;
                            }
                            else
                            {
                                 return back()->with('errstatus', 'Invalid otp');
                            }
       }
       else
       {
            Auth::guard('parent')->logout();
           return back()->with('errstatus', 'Invalid otp');
       }
 }
 else
 {
      return back()->with('status', 'You are not registered'); 
 }
    }
     
    
    public function parent_login()
    {
       
        $phone=$_POST['phone'];
        $parentuser=UserparentModel::where('phone',$phone)->first();
        if($parentuser)
        {
                                
                             
                                
                            
                                   //  echo"hi";exit();  
                    
                     trim($phone);
                     $num =trim($phone);
                            //$otp = rand(100000,999999);
                             $otp  = rand(1231,7879);
                            //  $otp=1234;
                          //  $_SESSION['otp'] = $otp;
                           Session::put('otp',$otp);
                    
                            $curl = curl_init();
                    
                            curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://2factor.in/API/V1/9a244e68-90b4-11ed-9158-0200cd936042/SMS/".$num."/".$otp."",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);
                    // echo $response;
                    
                    
                                echo json_encode(1); 
                            
                            
            
        }
        else
        {
              echo json_encode(2); 
        }
    }
    public function parent_registration(Request $request)
    {

// $request->validate([
//     'phone' => 'phone|unique:user_parents',
//     ]);

        $centreaddarray = array(
            'name' => trim($request['name']),
            'email' => trim($request['email']),
            'password' => trim(bcrypt(123)),
            'phone' => trim($request['phone']),
            'status'=>0
            
        );
        $parent_registration = UserparentModel::create($centreaddarray);
        if( $parent_registration)
        {
        
                                

 trim($request['phone']);
 $num =trim($request['phone']);
        //$otp = rand(100000,999999);
         $otp  = rand(1231,7879);
       // $_SESSION['otp'] = $otp;
       //$otp=1234;
       Session::put('otp',$otp);

        $curl = curl_init();

        curl_setopt_array($curl, array(
  CURLOPT_URL => "https://2factor.in/API/V1/9a244e68-90b4-11ed-9158-0200cd936042/SMS/".$num."/".$otp."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;


            echo json_encode(1); 
                           
        }
        else
        {
            echo json_encode(2);
        }
    }

    public function parentdata_display($id)
    {
        $parentdata = User::find($id);
        return view('my_account_details', compact('parentdata'));
    }

    public function parentdata_update()
    {
        // $id=$unit->id;
        $id = $_POST['id'];

        $prop = Unit::find($id);

        $prop->name = trim($request->name);
        $prop->email = trim($request->email);
        $prop->phone = trim($request->phone);
        $prop->user_id = 15;
        $prop->save();

        $alert = ['success', 'Updated successfully'];
        return back()->withAlert($alert);
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }


//GOOGLE


    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googlecallback()
    {
        $userdata = Socialite::driver('google')->user();
        $user = User::where('email', $userdata->email)->where('auth_type', 'google')->first();

        if ($user) {

            Auth::login($user);

            return redirect('/');

        } else {
            $uuid = Str::uuid()->toString();

            $user = new User();
            $user->name = trim($userdata->name);
            $user->email = trim($userdata->email);
            $user->password = Hash::make($id . now());
            $user->auth_type = 'google';
            $user->save();
            Auth::login($user);
            return redirect('/');

        }
    }

//INSTITUTION REGISTRATION

    public function institution_registration(Request $request)
    {

        // print_r($_POST);exit();
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'type' => 'required',
        ]);
        // $pass= bin2hex(random_bytes(6));
        $pass = 123;
        $centreaddarray = array(
            'name' => trim($request['name']),
            'email' => trim($request['email']),
            'password' =>trim( bcrypt($pass)),
            'phone' =>trim($request['phone']),
            'role' => 4,

            'auth_type' => trim($request['type']),
            'created_at'=>date('Y-m-d')
        );
        $institution_registration = User::create($centreaddarray);
        if ($institution_registration) {
            $msg = "<br>
   Please click the below link to log in your account</p>
   <p style='color:#000'><a href='https://schoolspe.com/login'>Click Here1</a></p>
   <p>Your login credencials are given below</p>
   <p>User name:&nbsp;" . $request['email'] . "</p>
    <p>password:&nbsp;" . $pass . "</p>
    </div>
    </div><br>";

            $sender = "info@lightagemasters.com";
            $recipient = $request['email'];
            $subject = "Schoolspe Registration ";
            $headers = 'From: Schoolspe <info@schoolspe.com>' . "\n";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= 'reply-to: info@schoolspe.com' . "\r\n";
            $headers .= 'Cc: info@schoolspe.com' . "\r\n";
            $headers .= 'From:' . $sender;

            $returnpath = '-f info@schoolspe.com';


// send email
         //   mail($recipient, $subject, $msg, $headers, $returnpath);


            // $alert = ['success','Registered Successfully'];
            // return back()->withAlert($alert);

            return back()->with('status', 'We have sent login credentials to your email id. Please login to proceed.');
        } else {
            return redirect()->route("institute")->with('errstatus', 'invalid data');
        }
    }


    

}





