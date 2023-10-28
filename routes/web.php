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
Route::get('/register',[AdminController::class,'register'])->name('register');
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

Route::get('/search', [AdminController::class, 'showSearchForm'])->name('search.form');
Route::post('/search', [AdminController::class, 'search'])->name('search');







// Route::get('/doctor-unavailable-form',[AdminController::class,'doctorForm']); //doctor unavailable form
Route::get('doctor-unavailable-form/{id}',[AdminController::class,'doctorForm'])->name('doctor-unavailable-form');//doctor unavailable form
Route::post('/doctor-form',[AdminController::class,'doctorapply']); //doctor unavailablity store on leaves table

Route::get('/doctor-logout',[AdminController::class,'doctorLogout'])->name('doctor.logout');

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

/// Route::get('/admin-pannel-gallery',[AdminController::class,'gallery'])->name('admin.gallery');
      //images
Route::get('/images', [AdminController::class, 'showImages'])->name('images');
Route::post('/images/upload', [AdminController::class, 'uploadImages'])->name('images.upload');
Route::delete('/images/{id}', [AdminController::class, 'deleteImage'])->name('images.delete');
Route::post('/images/delete-selected', [AdminController::class, 'deleteSelectedImages'])
    ->name('images.deleteSelected');

Route::post('/images/{id}/set-status', [AdminController::class, 'setStatus'])->name('images.setStatus');



// Route::patch('/images/{id}/status', [AdminController::class,'setStatus'])->name('images.setStatus');

Route::post('images/{image}/update-status', [AdminController::class,'updateImageStatus'])->name('images.updateStatus');

    //video
Route::get('/video', [AdminController::class, 'showVideo'])->name('video');
Route::post('/video/upload', [AdminController::class, 'uploadVideo'])->name('video.upload');
Route::delete('/video/{id}', [AdminController::class, 'deleteVideo'])->name('video.delete');
Route::post('/video/delete-selected', [AdminController::class, 'deleteSelectedVideo'])
    ->name('video.deleteSelected');

Route::post('/video/{id}/set-status', [AdminController::class, 'videoStatus'])->name('video.setStatus');    

         //testimonial
Route::get('/testimonial',[AdminController::class,'showTestimonial'])->name('testimonial');
Route::post('/testimonial/upload', [AdminController::class, 'uploadtestimonial'])->name('testimonial.upload');

Route::get('/testimonial/edit/{id}', [AdminController::class,'edit'])->name('testimonial.edit');
Route::put('/testimonials/{testimonial}', [AdminController::class, 'update'])->name('testimonial.update');

Route::delete('/testimonial/delete/{id}', [AdminController::class, 'deleteTestimonial'])->name('testimonial.delete');
Route::delete('/testimonial/delete-selected', [AdminController::class, 'deleteSelectedTestimonial']) ->name('testimonial.deleteSelected');
Route::post('/testimonial/{id}/set-status', [AdminController::class, 'testimonialStatus'])->name('testimonial.setStatus'); 

Route::get('about-us',[AdminController::class,'showAbout'])->name('about');
Route::post('/about-us/upload', [AdminController::class, 'uploadAbout'])->name('about.upload');
// Route::get('/about-us/edit/{id}', [AdminController::class,'aboutEdit'])->name('about.edit');
Route::get('/about-us/edit/{about}', [AdminController::class, 'aboutEdit'])->name('about.edit');
// Route::post('/about-us/{about}', [AdminController::class, 'aboutUpdate'])->name('about.update');
Route::put('/about-us/update', [AdminController::class, 'aboutUpdate'])->name('about.update'); 

Route::get('available-date',[AdminController::class,'availDate'])->name('avail.date');

Route::post('/check-available-dates', [AdminController::class,'checkAvailableDates'])->name('check.available.dates');
















