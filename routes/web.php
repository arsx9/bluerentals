<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/listing', [PagesController::class, 'listing']);
Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::get('/filter', [PagesController::class, 'filter'])->name('filter');
Route::get('/show/{id}', [PagesController::class, 'show']);
Route::post('/message', [PagesController::class, 'message'])->name('message');
Route::get('/uploads/{filename}', [PagesController::class, 'display_image'])->name('display_image');
Route::post('/listToday', [PagesController::class, 'listToday'])->name('listToday');

Route::resource('/messages', MessageController::class);

Route::post('/applications/{application}/upload-images', [ApplicationController::class, 'application_attach'])->name('applications.upload-images');

Route::get('/applications/{application}/message', [ApplicationController::class, 'message'])->name('applications.message');
Route::get('/applications/{application}/delete', [ApplicationController::class, 'destroy'])->name('applications.delete');
Route::post('/applications/{application}/send-message', [ApplicationController::class, 'sendMessage'])->name('applications.send-message');

Route::get('/messages/{message}/reply', [ApplicationController::class, 'reply'])->name('message.reply');
Route::post('/messages/{message}/send-reply', [ApplicationController::class, 'sendReply'])->name('message.send-reply');

Route::get('/applications/{application}/pdf', [ApplicationController::class, 'generatePdf'])->name('applications.pdf');
Route::get('/applications/{application}/report', [ApplicationController::class, 'report'])->name('applications.report');
//Route::get('/application/{application}', [ApplicationController::class, 'reply'])->name('message.reply');
Route::resource('/applications', ApplicationController::class);
Route::get('/agreement', [ApplicationController::class,'agreement'])->name('applications.agreement');
Route::post('/agreement', [ApplicationController::class,'storeAgreement'])->name('agreement.store');
Route::get('/download-image/{id}', function ($id) {
    $image = DB::table('application_images')->where('id',$id)->first();

    // Generate the full path to the file
    $filePath = public_path($image->image_path);

    // Check if the file exists
    if (file_exists($filePath)) {
        // Return the file as a download
        return Response::download($filePath);
    } else {
        // Return an error response if the file doesn't exist
        return response()->json([
            'error' => 'File not found.',
        ], 404);
    }
})->name('download.image');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:is_admin')->group(function(){
    Route::resource('/users', UsersController::class);
});

Route::prefix('admin')->name('admin.')->middleware('can:manage-properties')->group(function(){
    Route::resource('/properties', PropertyController::class);
});
