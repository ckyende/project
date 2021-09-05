<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\LabourController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

//Route::group(['middleware'=>['web']],function(){
//Route::resource('attendance','AttendanceController');
//});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('em/dashboard', [App\Http\Controllers\HomeController::class, 'emDashboard'])->name('em/dashboard');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

// ----------------------------- search user management ------------------------------//
// Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');

// ----------------------------- form change password ------------------------------//
Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form employee ------------------------------//
Route::get('all/employee/card', [App\Http\Controllers\EmployeeController::class, 'cardAllEmployee'])->middleware('auth')->name('all/employee/card');
Route::get('all/employee/list', [App\Http\Controllers\EmployeeController::class, 'listAllEmployee'])->middleware('auth')->name('all/employee/list');
Route::post('all/employee/save', [App\Http\Controllers\EmployeeController::class, 'saveRecord'])->middleware('auth')->name('all/employee/save');
Route::get('all/employee/view/edit/{national_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
Route::post('all/employee/edit', [App\Http\Controllers\EmployeeController::class, 'editRecord'])->middleware('auth')->name('all/employee/edit');
Route::get('all/employee/delete/{national_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');

// ----------------------------- form holiday ------------------------------//
Route::get('form/holidays/new', [App\Http\Controllers\HolidayController::class, 'holiday'])->middleware('auth')->name('form/holidays/new');
Route::post('form/holidays/save', [App\Http\Controllers\HolidayController::class, 'saveRecord'])->middleware('auth')->name('form/holidays/save');

// ----------------------------- form attendance ------------------------------//
Route::get('form/attendance', [App\Http\Controllers\AttendanceController::class, 'attendance'])->middleware('auth')->name('form/attendance');
Route::post('form/attendance/import', [App\Http\Controllers\AttendanceController::class, 'import'])->middleware('auth')->name('form/attendance/import');

// ----------------------------- form position ------------------------------//
Route::get('form/position', [App\Http\Controllers\PositionController::class, 'position'])->middleware('auth')->name('form/position');
Route::post('form/position/save', [App\Http\Controllers\PositionController::class, 'saveRecord'])->middleware('auth')->name('form/position/save');

// ----------------------------- form location ------------------------------//
Route::get('form/location', [App\Http\Controllers\LocationController::class, 'location'])->middleware('auth')->name('form/location');
Route::post('form/location/save', [App\Http\Controllers\LocationController::class, 'store'])->middleware('auth')->name('form/location/save');

// ----------------------------- form schedule ------------------------------//
Route::get('schedule', [App\Http\Controllers\ScheduleController::class, 'schedule'])->middleware('auth')->name('schedule');
Route::post('schedule/save', [App\Http\Controllers\ScheduleController::class, 'saveRecord'])->middleware('auth')->name('schedule/save');

// ---------------------------------- timesheet ------------------------------//
Route::get('timesheet', [App\Http\Controllers\TimesheetController::class, 'timesheet'])->middleware('auth')->name('timesheet');
Route::post('timesheet/save', [App\Http\Controllers\TimesheetController::class, 'saveRecord'])->middleware('auth')->name('timesheet/save');

Route::get('labour', [App\Http\Controllers\LabourController::class, 'labour'])->middleware('auth')->name('labour');
Route::post('labour/save', [App\Http\Controllers\LabourController::class, 'saveRecord'])->middleware('auth')->name('labour/save');

 // Shifts
 Route::delete('shifts/destroy', 'ShiftsController@massDestroy')->name('shifts.massDestroy');
 Route::resource('shifts', 'ShiftsController');





