<?php
use App\Controllers\Admin\CityController;
use App\Controllers\Admin\CollegeController;
use App\Controllers\Admin\CountryController;
use App\Controllers\Admin\CourseController;
use App\Controllers\Admin\EventController;
use App\Controllers\Admin\FacultyController;
use App\Controllers\Admin\FaqController;
use App\Controllers\Admin\GalleryController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\NoticeController;
use App\Controllers\Admin\partnerController;
use App\Controllers\Admin\ProjectController;
use App\Controllers\Admin\SessionController;
use App\Controllers\Admin\SettingController;
use App\Controllers\AdminController;
use App\Controllers\AdminStaticController;
use App\Controllers\AdminUser;
use App\Controllers\IndexController;
use App\Controllers\JoinusController;
use App\Controllers\LoginController;
use App\Controllers\MailController;
use App\Controllers\UserController;
use App\master\Router;


Router::get('/', [IndexController::class,"home"]);



/**
 * 
 * Only those user can access this route whose are not loged in yet
 */
Router::group(['middleware' => \App\Middlewares\Guest::class], function () {
  Router::get('login',[LoginController::class,"login"]);
  Router::get('joinus',[JoinusController::class,"joinus"]);
  Router::post('joinus',[JoinusController::class,"registration"]);
});




/**
 * user LoginAuth. This middleware apply token verification, usally for Cross site protection
 */
Router::group(['middleware' => \App\Middlewares\LoginAuth::class], function () {
  Router::post('dashboard',[LoginController::class,"dashboard"]);
});


// This url only can access when any user logedin but his profile information
// is not compleated yet. Without loged in no one can access this route.because a session protection added here. This session only set when user loged in.
Router::get('userdetails',[UserController::class,"userdetails"]);

/**
 * User Logout syatem
 */
Router::get('logout',[LoginController::class,"logout"]);

/**
 * 
 * This user email verificatrion route. This route update two field in users table. (token,is_verified)
 */
Router::get('mailverify/{sender}/{token}',[MailController::class,"emailVerification"],['defaultParameterRegex' => '[\w\-\@\#\.]+']);



Router::get('events',[EventController::class,"events"]);

/**
 * Only authenticated admin user can access this route
 */
Router::group(['middleware' => \App\Middlewares\Admin::class], function () {
  Router::get('admin',[AdminController::class,"index"]);
  Router::get('admin/users/manage',[AdminUser::class,"manage"]);
  Router::post('admin/user/status',[AdminUser::class,"status"]);
  Router::post('admin/user/role',[AdminUser::class,"role"]);

  Router::get('admin/country',[CountryController::class,"country"]);
  Router::post('admin/country',[CountryController::class,"insertCountry"]);
  Router::get('admin/country/delete/{code}',[CountryController::class,"deleteCountry"]);

  
  Router::get('admin/city',[CityController::class,"city"]);
  Router::post('admin/city',[CityController::class,"insertCity"]);
  Router::get('admin/city/delete/{code}',[CityController::class,"deleteCity"]);

  
  Router::get('admin/college',[CollegeController::class,"college"]);
  Router::post('admin/college',[CollegeController::class,"insertCollege"]);
  Router::get('admin/college/delete/{code}',[CollegeController::class,"deleteCollege"]);


  Router::get('admin/faculty',[FacultyController::class,"faculty"]);
  Router::post('admin/faculty',[FacultyController::class,"insertFaculty"]);
  Router::get('admin/faculty/delete/{code}',[FacultyController::class,"deletefaculty"]);


  
  Router::get('admin/session',[SessionController::class,"session"]);
  Router::post('admin/session',[SessionController::class,"insertSession"]);
  Router::get('admin/session/delete/{code}',[SessionController::class,"deleteSession"]);

  
  Router::get('admin/course',[CourseController::class,"course"]);
  Router::post('admin/course',[CourseController::class,"insertCourse"]);
  Router::get('admin/course/delete/{code}',[CourseController::class,"deleteCourse"]);



  Router::get('admin/faq',[FaqController::class,"faq"]);
  Router::post('admin/faq',[FaqController::class,"insertFaq"]);
  Router::get('admin/faq/delete/{code}',[FaqController::class,"deleteFaq"]);

  


  Router::get('admin/gallery',[GalleryController::class,"file"]);
  Router::post('admin/gallery',[GalleryController::class,"insertFile"]);
  Router::get('admin/gallery/delete/{code}',[GalleryController::class,"deleteFile"],['defaultParameterRegex' => '[\w\-\@\#\.]+']);



  Router::get('admin/notice',[NoticeController::class,"notice"]);
  Router::get('admin/notice/insert',[NoticeController::class,"noticeInsertPage"]);
  Router::post('admin/notice',[NoticeController::class,"noticeInsert"]);
  Router::get('admin/notice/delete/{code}',[NoticeController::class,"deleteNotice"]);
  Router::get('admin/notice/edit/{code}',[NoticeController::class,"editNotice"]);
  Router::post('admin/notice/update',[NoticeController::class,"noticeUpdate"]);



  Router::get('admin/home/about',[HomeController::class,"about"]);
  Router::post('admin/home/about',[HomeController::class,"insertAbout"]);
  Router::get('admin/home/about/delete/{code}',[HomeController::class,"homeAboutDelete"]);





  
  Router::get('admin/partners',[partnerController::class,"partners"]);
  Router::post('admin/partner',[partnerController::class,"insertPartner"]);
  Router::get('admin/partner/status/{id}',[partnerController::class,"statusPartner"]);

  
  Router::get('admin/projects',[ProjectController::class,"projects"]);
  Router::post('admin/project',[ProjectController::class,"insertProject"]);
  Router::get('admin/project/status/{id}',[ProjectController::class,"statusProject"]);


  
  Router::get('admin/setting',[SettingController::class,"setting"]);
  Router::post('admin/setting',[SettingController::class,"updateSetting"]);

  
  
  Router::get('admin/events',[EventController::class,"events"]);
  Router::post('admin/event',[EventController::class,"insertEvents"]);
  Router::get('admin/event/status/{id}',[EventController::class,"statusEvent"]);

});

