<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\SchoolsearchController;
use App\Http\Controllers\CounsellorController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReferalsController;
use App\Http\Controllers\BlogsreplyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UsercontactController;
use App\Http\Controllers\InsContactusController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\admin\ProductController;



// INSTITUTION CONTROLLER
use App\Http\Controllers\institute\InstitutedasboardController;





// ADMIN CONTROLLER
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PremiumController;
use App\Http\Controllers\admin\MasterentryController;
use App\Http\Controllers\admin\AdmininstitutionController;
use App\Http\Controllers\admin\AdminLeadsController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\AdminapplicationController;








Route::get('clear-cache', function() {
  Artisan::call('cache:clear');
//   Artisan::call('optimize');
//   Artisan::call('route:cache');
//   Artisan::call('route:clear');
//   Artisan::call('view:clear');
//   Artisan::call('config:cache');
//   Artisan::call('config:clear');
  return "All Cache Cleared !!!";
});

Route::middleware('auth')->group(function ()
{
//INSTITUTE DASHBOARD CONTROLLER
Route::get('index1', [SiteController::class, 'index1'])->name('index1');
        Route::get('billing_info',[InstitutedasboardController::class,'billing_info'])->name('billing_info');
        Route::get('admission_pdf/{id}',[InstitutedasboardController::class,'admission_pdf'])->name('admission_pdf');
        Route::get('application_search',[InstitutedasboardController::class,'application_search'])->name('application_search');
        Route::get('discount_date',[InstitutedasboardController::class,'discount_date'])->name('discount_date');
        Route::get('seat_remain',[InstitutedasboardController::class,'seat_remain'])->name('seat_remain');
        Route::get('admission_view/{id}',[InstitutedasboardController::class,'admission_view'])->name('admission_view');
        Route::get('ins_Institutions/{id}',[InstitutedasboardController::class,'ins_Institutions'])->name('ins_Institutions');
        Route::get('ins_institution',[InstitutedasboardController::class,'ins_institution'])->name('ins_institution');
        Route::get('remove_ins_video/{i}/{id}',[InstitutedasboardController::class,'remove_ins_video'])->name('remove_ins_video');
        Route::get('remove_ins_image/{i}/{id}',[InstitutedasboardController::class,'remove_ins_image'])->name('remove_ins_image');
        Route::post('ins_course_offered',[InstitutedasboardController::class,'ins_course_offered'])->name('ins_course_offered');
        Route::get('edit_ins_course', [InstitutedasboardController::class,'edit_ins_course'])->name('edit_ins_course');
        Route::post('institution_update1',[InstitutedasboardController::class,'institution_update1'])->name('institution_update1');
        Route::post('admission_date_update', [InstitutedasboardController::class,'admission_date_update'])->name('admission_date_update');
        Route::get('ins_msg', [InstitutedasboardController::class,'ins_msg'])->name('ins_msg');
        Route::get('college_offered', [InstitutedasboardController::class,'college_offered'])->name('college_offered');
        Route::get('edit_school', [InstitutedasboardController::class, 'edit_school'])->name('edit_school');
        Route::POST('ins_profile_update', [InstitutedasboardController::class, 'ins_profile_update'])->name('ins_profile_update');
        Route::get('edit_college_details', [InstitutedasboardController::class, 'edit_college_details'])->name('edit_college_details');
        Route::get('edit_college_courses', [InstitutedasboardController::class, 'edit_college_courses'])->name('edit_college_courses');
        Route::post('update_college_details',[InstitutedasboardController::class,'update_college_details'])->name('update_college_details');
        Route::get('institute_addmission', [InstitutedasboardController::class, 'institute_addmission'])->name('institute_addmission');
        Route::get('institute_dashboard', [InstitutedasboardController::class, 'institute_dashboard'])->name('institute_dashboard');
        Route::get('ins_msgdelete/{id}',[InstitutedasboardController::class,'ins_msgdelete'])->name('ins_msgdelete');
        Route::get('admission/{id}', [InstitutedasboardController::class, 'admission'])->name('admission');
        Route::get('add_institution', [InstitutedasboardController::class, 'add_institution'])->name('add_institution');
        Route::post('institute_datainsert',[InstitutedasboardController::class,'institute_datainsert'])->name('institute_datainsert');
        Route::get('ins_select', [InstitutedasboardController::class,'ins_select']);
        Route::get('help', [InstitutedasboardController::class, 'help'])->name('help');
        Route::post('ins_change_password',[InstitutedasboardController::class,'ins_change_password'])->name('ins_change_password');
        Route::get('ins_delete',[InstitutedasboardController::class,'ins_delete'])->name('ins_delete');
        Route::get('remove_discount/{id}', [InstitutedasboardController::class, 'remove_discount'])->name('remove_discount');
    

});

// WISHLIST CONTROLLER
Route::POST('get_wishlist', [WishlistController::class,'get_wishlist'])->name('get_wishlist');
Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::get('remove_wishlist/{id}',[WishlistController::class,'remove_wishlist'])->name('remove_wishlist');
// PREMIUM MEMBER START
Route::get('premium_cancel/{id}',[PremiumController::class,'premium_cancel'])->name('premium_cancel');
Route::get('premium', [PremiumController::class, 'premium'])->name('premium');
Route::get('ins_premium_update',[PremiumController::class,'ins_premium_update'])->name('ins_premium_update');

//SITE CONTROLLER
Route::get('signin', [SiteController::class, 'signin'])->name('signin');
Route::get('user_login', [SiteController::class, 'user_login'])->name('user_login');
Route::get('profile1', [SiteController::class, 'profile1'])->name('profile1');
Route::get('institute', [SiteController::class, 'institute'])->name('institute');
Route::get('/', [SiteController::class, 'index'])->name('index');

Route::post('notifyme',[SiteController::class,'notifyme'])->name('notifyme');

// AUTH
Route::get('edit_details_of_school/{id}', [SiteController::class, 'edit_details_of_school'])->name('edit_details_of_school');
Route::get('logout', [CustomAuthController::class, 'logout']);
Route::post('contact', [CustomAuthController::class, 'contact'])->name('contact');
Route::get('contact_us', [CustomAuthController::class, 'contact_us'])->name('contact_us');
Route::get('what_we_Do', [CustomAuthController::class, 'what_we_Do'])->name('what_we_Do');
Route::get('dashboard_client', [CustomAuthController::class, 'dashboard_client']);
Route::post('login', [CustomAuthController::class,'customLogin']);
Route::post('ins_login', [CustomAuthController::class,'ins_login']);
Route::post('admin_login', [CustomAuthController::class,'admin_login'])->name('admin_login'); ;
Route::get('custom-login2', [CustomAuthController::class, 'customLogin2'])->name('login.custom2');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-login1', [CustomAuthController::class, 'customLogin1'])->name('login.custom1');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('logout', [CustomAuthController::class,'logout']);
Route::post('parent_login', [CustomAuthController::class,'parent_login'])->name('parent_login');
Route::get('parent_login_two', [CustomAuthController::class,'parent_login_two'])->name('parent_login_two');
Route::get('resend_otp', [CustomAuthController::class,'resend_otp'])->name('resend_otp');
Route::get('parent_logout', [CustomAuthController::class,'parent_logout']);
Route::get('admin_logout', [CustomAuthController::class, 'admin_logout'])->name('admin_logout');

//PARENT
Route::post('get_otp', [CustomAuthController::class, 'get_otp'])->name('get_otp');
Route::post('parent_registration', [CustomAuthController::class, 'parent_registration'])->name('parent_registration');
Route::post('parentdata_store',[ParentController::class,'parentdata_store'])->name('parentdata_store');
Route::get('display_customer/{id}',[ParentController::class,'display_customer'])->name('display_customer');
Route::get('parentdata_edit/{id}',[CustomAuthController::class,'parentdata_edit'])->name('parentdata_edit');
Route::post('parentdata_update',[CustomAuthController::class,'parentdata_update'])->name('parentdata_update');







Route::post('institution_update',[InstitutionController::class,'institution_update'])->name('institution_update');
Route::get('institution_destroy/{id}',[InstitutionController::class,'institution_destroy'])->name('institution_destroy');
Route::post('institution_registration', [CustomAuthController::class, 'institution_registration'])->name('institution_registration');
Route::get('institution_logout', [CustomAuthController::class, 'institution_logout'])->name('institution_logout');

      //Products
      Route::delete('specification/delete/{id}',[ProductController::class,'deleteSpecification'])->name('specification.delete');
      Route::post('gallery/image/store',[ProductController::class,'galleryImageStore'])->name('gallery-image.store');
      Route::delete('gallery/image/delete/{id}',[ProductController::class,'galleryImageDelete'])->name('gallery-image.delete');

      Route::get('products',[ProductController::class,'index'])->name('products.index');
      Route::get('products/create',[ProductController::class,'create'])->name('products.create');
      Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
      Route::post('products/change-status/{id}',[ProductController::class,'changeStatus'])->name('products.change-status');
      Route::post('products/fetch-category',[ProductController::class,'fetchCategory'])->name('products.fetch-category');
      Route::post('products/fetch-sub-category',[ProductController::class,'fetchSubCategory'])->name('products.fetch-sub-category');
      Route::post('saveStep1',[ProductController::class,'saveProducts'])->name('products.details');
      Route::post('saveStep2',[ProductController::class,'saveSpecifications'])->name('products.specifications');
      
      Route::post('products/change-status/{id}',[ProductController::class,'changeStatus'])->name('products.change-status');
      Route::delete('destroy/{id}',[ProductController::class,'destroy'])->name('products.destroy');

Route::post('get_premium',[InstitutionController::class,'get_premium'])->name('get_premium');
Route::get('get_admission',[InstitutionController::class,'get_admission'])->name('get_admission');
Route::get('courseoffered_destroy/{id}',[InstitutionController::class,'courseoffered_destroy']);
Route::post('clg_action',[InstitutionController::class,'clg_action'])->name('clg_action');
Route::get('course_offered', [InstitutionController::class, 'course_offered_form'])->name('course_offered');

Route::post('forgotpassword', [InstitutionController::class, 'forgotpassword'])->name('forgotpassword');





//USERS
Route::get('user_search',[UserController::class,'user_search'])->name('user_search');
Route::get('userdata_search',[UserController::class,'userdata_search'])->name('userdata_search');

// 



Route::get('Main_category',[MasterentryController::class,'Main_category'])->name('Main_category');
Route::get('category',[MasterentryController::class,'category'])->name('category');
Route::post('maincat_store',[MasterentryController::class,'maincat_store'])->name('maincat_store');
Route::post('pro_detail_uppdate',[MasterentryController::class,'pro_detail_update'])->name('pro_detail_update');
Route::post('courses_store',[MasterentryController::class,'courses_store'])->name('courses_store');
Route::get('courses_edit/{id}',[MasterentryController::class,'courses_edit'])->name('courses_edit');
Route::post('courses_update',[MasterentryController::class,'courses_update'])->name('courses_update');
Route::post('maincat_update',[MasterentryController::class,'maincat_update'])->name('maincat_update');
Route::get('courses_destroy/{id}',[MasterentryController::class,'courses_destroy'])->name('courses_destroy');
Route::get('coursesstatus',[MasterentryController::class,'coursesstatus'])->name('coursesstatus');
Route::get('course_search',[MasterentryController::class,'course_search'])->name('course_search');
Route::get('product_deta_search',[MasterentryController::class,'product_deta_search'])->name('product_deta_search');
Route::get('product_details',[MasterentryController::class,'product_details'])->name('product_details');




//STREAMS
Route::get('Subcategory',[MasterentryController::class,'Subcategory'])->name('Subcategory');
Route::post('streams_store',[MasterentryController::class,'streams_store'])->name('streams_store');
Route::get('streams_edit/{id}',[MasterentryController::class,'streams_edit'])->name('streams_edit');
Route::post('streams_update',[MasterentryController::class,'streams_update'])->name('streams_update');
Route::get('streams_destroy/{id}',[MasterentryController::class,'streams_destroy'])->name('streams_destroy');
Route::get('streamsstatus',[MasterentryController::class,'streamsstatus'])->name('streamsstatus');
Route::get('stream_search',[MasterentryController::class,'stream_search'])->name('stream_search');


// SEARCH START
Route::get('search_reset',[SchoolsearchController::class,'search_reset'])->name('search_reset');
Route::get('first_home_search',[SchoolsearchController::class,'first_home_search'])->name('first_home_search');
Route::get('advanced_search',[SchoolsearchController::class,'advanced_search'])->name('advanced_search');
Route::get('home_search',[SchoolsearchController::class,'home_search'])->name('home_search');
Route::get('search_school',[SchoolsearchController::class,'search_school'])->name('search_school');
Route::get('college_search_result',[SchoolsearchController::class,'college_search_result'])->name('college_search_result');
Route::get('poly_search_result', [SchoolsearchController::class, 'poly_search_result'])->name('poly_search_result');
Route::get('ug_pg_colleges', [SchoolsearchController::class, 'ug_pg_colleges_result'])->name('ug_pg_colleges_result');

//MESSAGE

Route::post('message_store',[MessageController::class,'message_store'])->name('message_store');






//APPLICATION

Route::get('application_edit/{id}',[ApplicationController::class,'application_edit'])->name('application_edit');
Route::get('pay_offline/{id}',[ApplicationController::class,'pay_offline'])->name('pay_offline');
Route::post('application_store',[ApplicationController::class,'application_store'])->name('application_store');
Route::post('application_preview',[ApplicationController::class,'application_preview'])->name('application_preview');
Route::post('update_application', [ApplicationController::class,'update_application'])->name('update_application');
Route::get('admission_pdf_data/{id}', [ApplicationController::class, 'admission_pdf_data'])->name('admission_pdf_data');

//PARENT PANEL CONTROLLERS=====================================================================================
//PARENT

Route::middleware('parent')->group(function ()
{
    
    Route::get('my_account_details', [SiteController::class, 'my_account_details'])->name('my_account_details');
    Route::get('my_account', [SiteController::class, 'my_account'])->name('my_account');
    Route::get('my_profile', [SiteController::class, 'my_profile'])->name('my_profile');
    Route::post('parent_first_update', [ParentController::class, 'parent_first_update'])->name('parent_first_update');
    Route::get('admission_pdf_parent/{id}', [ParentController::class, 'admission_pdf_parent'])->name('admission_pdf_parent');
    Route::get('application_submitted', [ParentController::class, 'application_submitted'])->name('application_submitted');
    Route::get('application_submitted_done', [ParentController::class, 'application_submitted_done'])->name('application_submitted_done');











});

//ADMIN PANEL CONTROLLERS=====================================================================================
//ADMIN
Route::get('login',[AdminController::class,'index'])->name('login');
Route::middleware('admin')->group(function ()
{
        Route::get('user',[AdminLeadsController::class,'user'])->name('user');
        Route::put('profile', [ProfileController::class, 'update']);
        Route::resource('profile', ProfileController::class);
        Route::get('change-password', [PasswordController::class, 'edit'])->name('change-password');
        Route::put('change-password', [PasswordController::class, 'update'])->name('change-password.update');
        Route::resource('teams', OurteamController::class);
        Route::resource('contents', ContentController::class);
        Route::get('dashboard', [CustomAuthController::class,'dashboard']);
        Route::put('profile', [ProfileController::class, 'update']);
        Route::resource('index', ProfileController::class);
        Route::get('change-password', [PasswordController::class, 'edit'])->name('change-password');
        Route::put('change-password', [PasswordController::class, 'update'])->name('change-password.update');

  
        //COURSES
        Route::get('courses',[MasterentryController::class,'courses'])->name('courses');
        Route::post('courses_store',[MasterentryController::class,'courses_store'])->name('courses_store');
        Route::get('courses_edit/{id}',[MasterentryController::class,'courses_edit'])->name('courses_edit');
        Route::post('courses_update',[MasterentryController::class,'courses_update'])->name('courses_update');
        Route::get('courses_destroy/{id}',[MasterentryController::class,'courses_destroy'])->name('courses_destroy');
        Route::get('coursesstatus',[MasterentryController::class,'coursesstatus'])->name('coursesstatus');
        //USERS
        Route::post('adduser',[UserController::class,'adduser'])->name('adduser');
        Route::get('edituser/{id}',[UserController::class,'edituser'])->name('edituser');
        Route::post('userupdate',[UserController::class,'userupdate'])->name('userupdate');
        Route::get('userdestroy/{id}',[UserController::class,'userdestroy'])->name('userdestroy');
        Route::get('userstatus',[UserController::class,'userstatus'])->name('userstatus');

       Route::get('password', [UserController::class, 'password'])->name('password');
       Route::post('admin_change_password',[UserController::class,'admin_change_password'])->name('admin_change_password');
       Route::get('user_profile', [UserController::class, 'user_profile'])->name('user_profile');
       Route::post('admin_profile_update',[UserController::class,'admin_profile_update'])->name('admin_profile_update');

        //STREAMS
        Route::get('streams',[MasterentryController::class,'streams'])->name('streams');
        Route::post('streams_store',[MasterentryController::class,'streams_store'])->name('streams_store');
        Route::get('streams_edit/{id}',[MasterentryController::class,'streams_edit'])->name('streams_edit');
        Route::post('streams_update',[MasterentryController::class,'streams_update'])->name('streams_update');
        Route::get('streams_destroy/{id}',[MasterentryController::class,'streams_destroy'])->name('streams_destroy');
        Route::get('streamsstatus',[MasterentryController::class,'streamsstatus'])->name('streamsstatus');
        //COUNSELLOR
        
    
       

        //Referals
        Route::get('referals',[ReferalsController::class,'referals'])->name('referals');
       
        Route::get('referals_destroy/{id}',[ReferalsController::class,'referals_destroy'])->name('referals_destroy');

       
        Route::get('display_contactdata/{id}',[ContactController::class,'display_contactdata'])->name('display_contactdata');
        Route::get('contact_destroy/{id}',[ContactController::class,'contact_destroy'])->name('contact_destroy');

        //INSTITITION
        Route::get('institutionstatus',[AdmininstitutionController::class,'institutionstatus'])->name('institutionstatus');
       

        // LEADS CONTROLLER
        Route::get('freshlead_export',[AdminLeadsController::class,'freshlead_export'])->name('freshlead_export');
       
        
        Route::get('Userexport',[UserController::class,'Userexport'])->name('Userexport');
       

        //Schoolspe Users
        Route::get('schoolpeusers',[UserController::class,'schoolpeusers'])->name('schoolpeusers');
        Route::post('addschoolpe_user',[UserController::class,'addschoolpe_user'])->name('addschoolpe_user');
        Route::get('schoolpeusers_destroy/{id}',[UserController::class,'schoolpeusers_destroy'])->name('schoolpeusers_destroy');
        Route::post('schoolpseupdate_user',[UserController::class,'schoolpseupdate_user'])->name('schoolpseupdate_user');
        Route::put('user_action/{id}',[UserController::class,'user_action'])->name('user_action');


        //UserContactController
        Route::get('usercontact',[AdminLeadsController::class,'usercontact'])->name('usercontact');
        Route::post('usercontact_store',[UsercontactController::class,'usercontact_store'])->name('usercontact_store');
        Route::get('usercontact_destroy/{id}',[AdminLeadsController::class,'usercontact_destroy'])->name('usercontact_destroy');


        //Settings
        Route::get('settings',[SettingsController::class,'settings'])->name('settings');
        Route::get('settings_edit/{id}',[SettingsController::class,'settings_edit'])->name('settings_edit');
        Route::post('settings_update',[SettingsController::class,'settings_update'])->name('settings_update');
        
        //Applications
        Route::get('offlineapplications',[AdminapplicationController::class,'offlineapplications'])->name('offlineapplications');
        Route::get('onlineapplications',[AdminapplicationController::class,'onlineapplications'])->name('onlineapplications');
        Route::get('pendingapplications',[AdminapplicationController::class,'pendingapplications'])->name('pendingapplications');
        Route::get('display_offlineapplications/{id}',[AdminapplicationController::class,'display_offlineapplications'])->name('display_offlineapplications');
        Route::get('display_onlineapplications/{id}',[AdminapplicationController::class,'display_onlineapplications'])->name('display_onlineapplications');
        Route::get('display_pendingapplications/{id}',[AdminapplicationController::class,'display_pendingapplications'])->name('display_pendingapplications');
        Route::get('onlineapp_search',[AdminapplicationController::class,'onlineapp_search'])->name('onlineapp_search');
        Route::get('offlineapp_search',[AdminapplicationController::class,'offlineapp_search'])->name('offlineapp_search');
        Route::get('pendingapp_search',[AdminapplicationController::class,'pendingapp_search'])->name('pendingapp_search');
        Route::get('admission_pdf1/{id}',[AdminapplicationController::class,'admission_pdf1'])->name('admission_pdf1');
        
        Route::get('onlineapp_destroy/{id}',[AdminapplicationController::class,'onlineapp_destroy'])->name('onlineapp_destroy');
        Route::get('offlineapp_destroy/{id}',[AdminapplicationController::class,'offlineapp_destroy'])->name('offlineapp_destroy');
        Route::get('pendingapp_destroy/{id}',[AdminapplicationController::class,'pendingapp_destroy'])->name('pendingapp_destroy');
        
        //AdvanceLeads
         Route::get('advanceleads',[AdminLeadsController::class,'advanceleads'])->name('advanceleads');
         Route::get('advancelead_destroy/{id}',[AdminLeadsController::class,'advancelead_destroy'])->name('advancelead_destroy');

         //Banner
         Route::resource('banners',BannerController::class);
         Route::post('banners/change-status/{id}',[BannerController::class,'changeStatus'])->name('banners.change-status');
        

     
         
        
      

});





