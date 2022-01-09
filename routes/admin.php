<?php

use App\Http\Controllers\Admin\AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdmin;
use App\Http\Controllers\Admin\ManageBooking;
use App\Http\Controllers\Admin\ManageCategory;
use App\Http\Controllers\Admin\ManageExpense;
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


 
///**********************Content Management************************ */
///load_expense_list
Route::get('admin/expense_list', [ManageExpense::class, 'load_expense_list']);

///add_expense
Route::get('admin/add_expense', [ManageExpense::class, 'add_expense']);
Route::post('admin/add_expense_process', [ManageExpense::class, 'add_expense_process']);


///edit_expense
Route::get('admin/edit_expense/{id}', [ManageExpense::class, 'edit_expense']);
Route::post('admin/update_expense_process', [ManageExpense::class, 'update_expense_process']);

///delete_expense_process
Route::post('admin/delete_expense_process', [ManageExpense::class,'delete_expense_process']);
