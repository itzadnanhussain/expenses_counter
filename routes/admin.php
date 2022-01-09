<?php

use App\Http\Controllers\Admin\AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdmin;
use App\Http\Controllers\Admin\ManageBooking;
use App\Http\Controllers\Admin\ManageCategory;
use App\Http\Controllers\Admin\ManageContent;
use App\Http\Controllers\Admin\ManageEmail;
use App\Http\Controllers\Admin\ManageUsers;
use App\Http\Controllers\Admin\ManagePayment;
use App\Http\Controllers\Admin\ManageProperty;
use App\Http\Controllers\Admin\ManageReview;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



///**********************Login Controller**************************/
///login page
Route::get('admin/login', [LoginAdmin::class, 'load_login_page']);
Route::post('admin/login', [LoginAdmin::class, 'load_login_process']);

///logout
Route::get('admin/logout', [LoginAdmin::class, 'admin_logout']);


///**********************Admin Dashboard************************ */
///load_dashboard
Route::get('admin/dashboard', [AdminDashboard::class, 'load_dashboard']);


///**********************User Management************************ */
///load_users_list
Route::get('admin/users_list', [ManageUsers::class, 'load_users_list']);

///add_user
Route::get('admin/add_user', [ManageUsers::class,'add_user']);
Route::post('admin/add_user_process', [ManageUsers::class,'add_user_process']);

///image_upload_process
Route::post('admin/image_upload_process', [ManageUsers::class,'image_upload_process']);

///delete_user_process
Route::post('admin/delete_user_process', [ManageUsers::class,'delete_user_process']);

///edit_user
Route::get('admin/edit_user/{id}', [ManageUsers::class,'edit_user']);
Route::post('admin/update_user_process', [ManageUsers::class,'update_user_process']);


///load_user_profile
Route::get('admin/user_profile/{id}', [ManageUsers::class,'load_user_profile']);



///**********************Content Management************************ */
///load_content_list
Route::get('admin/content_list', [ManageContent::class, 'load_content_list']);

///add_content
Route::get('admin/add_content', [ManageContent::class, 'add_content']);
Route::post('admin/add_content_process', [ManageContent::class, 'add_content_process']);


///edit_content
Route::get('admin/edit_content/{id}', [ManageContent::class, 'edit_content']);
Route::post('admin/update_content_process', [ManageContent::class, 'update_content_process']);

///delete_content_process
Route::post('admin/delete_content_process', [ManageContent::class,'delete_content_process']);




///**********************Payment Management************************ */
///load_payment_list
Route::get('admin/payment_list', [ManagePayment::class, 'load_payment_list']);


///**********************Category Management************************ */
///load_category_list
Route::get('admin/category_list', [ManageCategory::class, 'load_category_list']);

///add_content
Route::get('admin/add_category', [ManageCategory::class, 'add_category']);
Route::post('admin/add_category_process', [ManageCategory::class, 'add_category_process']);


///edit_content
Route::get('admin/edit_category/{id}', [ManageCategory::class, 'edit_category']);
Route::post('admin/update_category_process', [ManageCategory::class, 'update_category_process']);

///delete_category_process
Route::post('admin/delete_category_process', [ManageCategory::class,'delete_category_process']);

 


///**********************Property Management************************ */
///load_property_list
Route::get('admin/property_list', [ManageProperty::class, 'load_property_list']);

///load_property_profile
Route::get('admin/property_profile/{property_id}', [ManageProperty::class, 'load_property_profile']);

///delete_property_process
Route::post('admin/delete_property_process', [ManageProperty::class, 'delete_property_process']);



///**********************Booking Management************************ */
///load_booking_list
Route::get('admin/booking_list', [ManageBooking::class, 'load_booking_list']);


///**********************Review Management************************ */
///load_review_list
Route::get('admin/review_list', [ManageReview::class, 'load_review_list']);

///get_review_detail_by_id
Route::post('admin/get_review_detail_by_id', [ManageReview::class, 'get_review_detail_by_id']);

///edit_review
Route::get('admin/edit_review/{id}', [ManageReview::class, 'edit_review']);
Route::post('admin/update_review_process', [ManageReview::class, 'update_review_process']);


///delete_review_process
Route::post('admin/delete_review_process', [ManageReview::class, 'delete_review_process']);


///**********************Email Management************************ */
///load_email_temp_list
Route::get('admin/email_temp_list', [ManageEmail::class, 'load_email_temp_list']);


///add_email_temp
Route::get('admin/add_email_temp', [ManageEmail::class, 'add_email_temp']);
Route::post('admin/add_email_temp_process', [ManageEmail::class, 'add_email_temp_process']);


///edit_email_temp
Route::get('admin/edit_email_temp/{id}', [ManageEmail::class, 'edit_email_temp']);
Route::post('admin/update_email_temp_process', [ManageEmail::class, 'update_email_temp_process']);

///delete_email_temp_process
Route::post('admin/delete_email_temp_process', [ManageEmail::class,'delete_email_temp_process']);
