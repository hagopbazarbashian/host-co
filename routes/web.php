<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\transferInfoController;
use App\Http\Controllers\User\HomeControllerr;
use App\Http\Controllers\transferInfoforuserloginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialAuthController;
use App\Jobs\DeleteOldRecords;

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
// Home Page
Route::get('/',[HomeController::class , 'index'])->name('home');
// Login page 
Route::get('free-trial',[LoginController::class , 'index'])->name('free_trial');
Route::post('login-submit',[LoginController::class , 'loginsumbit'])->name('login_submit');

Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('callback/google', [SocialAuthController::class, 'handleGoogleCallback']);
// Register
Route::get('register',[RegisterController::class , 'index'])->name('register');
Route::post('register-submit',[RegisterController::class , 'registersumbit'])->name('register_submit');

Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('send_contact');

//Start Tranfer
Route::post('start-send' , [transferInfoController::class , 'store'])->name('start_send');
Route::get('/download/{uniqueLink}', [transferInfoController::class, 'download'])->name('download.file');


Route::middleware(['web:web'])->group(function () {
  
    Route::get('user-home' , [HomeControllerr::class , 'index'])->name('user_home');

    //Start Tranfer
    Route::post('start-send-user' , [transferInfoforuserloginController::class , 'storeuser'])->name('start_send_for_user');
    Route::get('/download/{uniqueLink}', [transferInfoforuserloginController::class, 'downloaduser'])->name('download.file');
    // Route::get('/send-test-email', function () {
    //     $userEmail = 'test@example.com';
    //     $zipDownloadLink = 'http://example.com/download/link/to/zip';

    //     Mail::send('emails.uploaded', ['downloadLink' => $zipDownloadLink], function($message) use ($userEmail) {
    //         $message->to($userEmail)
    //                 ->subject('Your uploaded files');
    //     });

    //     return 'Email sent!';
    // });
});

Route::get('/test-job', function () {
    DeleteOldRecords::dispatch();
    return 'Job dispatched!';
});

Route::get('/clear-cache', function() {
    // Artisan::call('cache:clear');
    Artisan::call('storage:link');
    return "Cache is cleared";
});
