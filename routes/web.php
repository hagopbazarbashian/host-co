<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RegisterController,transferInfoController,LoginController,HomeController,LinkClickController};
use App\Http\Controllers\User\{HomeControllerr,ShowUserFilesController,SendTextController};
use App\Http\Controllers\Admin\{AdminHomePage,AdminUserControler,AdminFilesController};
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
Route::get('/',[HomeController::class , 'index'])->middleware('trackVisitors')->name('home');
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

//Recored application downlod 
Route::post('/track-click', [LinkClickController::class, 'trackClick'])->name('track.click');

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


    //Text Syetem
    Route::get('send-text' , [SendTextController::class , 'index'])->name('send_text');
    Route::get('start-proces' , [SendTextController::class , 'proces'])->name('start_proces');

    //Show User Files 
    Route::get('show-files/{id}' ,[ShowUserFilesController::class , 'index'])->name('show_files');

    //Admin  Syetem 
    Route::get('admin-panel' ,[AdminHomePage::class , 'index'])->name('admin_panel');  

    //Show User Admin
    Route::get('all-user' , [AdminUserControler::class , 'index'])->name('all_user');  

    //Remove User Admin
    Route::delete('remove-user/{id}' , [AdminUserControler::class , 'removeuser'])->name('remove_user');

    //Admin Remove Files index
    Route::get('all-files' , [AdminFilesController::class , 'index'])->name('all_files');   

    //Admin dete Files
    Route::delete('all-files-remove/{id}' , [AdminFilesController::class , 'removefiles'])->name('remove_files');   

});

Route::get('/Privacy-Policy', function () {   
    return  view('Privacy-Policy');     
});

Route::get('/Terms-Conditions', function () {
    return  view('Terms-Conditions'); 
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
