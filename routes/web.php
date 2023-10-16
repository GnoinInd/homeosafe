<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register',[AdminController::class,'register']);
Route::post('/register',[AdminController::class,'registration'])->name('admin.register');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login',[AdminController::class,'checkLogin'])->name('check.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['web','adminCheck']],function(){
    Route::get('/admin/dashboard', [AdminController::class,'admin'])->name('admin.dashboard');
});




Route::get('/',[AdminController::class,'index']);
Route::get('/form',[AdminController::class,'form']);
Route::post('/form',[AdminController::class,'formSubmit'])->name('form.submit');
Route::get('/patient-list',[AdminController::class,'list'])->name('patient.list');
// Route::get('/doctor-unavailable-form',[AdminController::class,'doctorForm']); //doctor unavailable form
Route::get('doctor-unavailable-form/{id}',[AdminController::class,'doctorForm'])->name('doctor-unavailable-form');//doctor unavailable form
Route::post('/doctor-form',[AdminController::class,'doctorapply']); //doctor unavailablity store on leaves table

Route::get('/doctor-login',[AdminController::class,'doctorLogin']); //doctor login form
Route::post('/doctor-login',[AdminController::class,'doctorCheckLogin'])->name('doctor.check'); //check doctor login

Route::get('/calendar',[AdminController::class,'showCalendar'])->name('calendar');

 //doctor details
Route::get('/doctor',[AdminController::class,'doctor']);  // doctor registration form
Route::post('/doctor-details',[AdminController::class,'doctorDetail']);

// Route::get('/admin/notifications', [AdminController::class, 'showNotifications'])->name('admin.showNotifications');
Route::post('/mark-notification-as-read/{id}', [AdminController::class, 'markNotificationAsRead'])->name('mark-notification-as-read');
// Route::get('/get-notification-details/{id}', [AdminController::class, 'markNotificationAsRead'])
//     ->name('get-notification-details');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'indexes'])->name('admin.index');
//     Route::post('/mark-notifications-as-read', [AdminController::class, 'markNotificationsAsRead'])->name('admin.markNotificationsAsRead');
// });

// Route::post('/mark-notification-as-read/{notification}', [AdminController::class, 'markNotificationAsRead'])->name('mark-notification-as-read');




