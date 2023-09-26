<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoticeController;

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

Route::get('/',[FrontendController::class,'index'])->name('home');
Route::resource('membership',MembershipController::class);
Route::post('membership-action',[MembershipController::class,'membershipAction'])->name('membership.action');
Route::get('gallerys',[GalleryController::class,'galleryFrontendView'])->name('gallery');
Route::resource('contact',ContactController::class);
Route::get('blogs',[BlogController::class,'blogFrontendView'])->name('blog');
Route::get('blog-details/{id}',[BlogController::class,'blogDetails'])->name('blog.details');
Route::get('events',[EventController::class,'eventFrontendView'])->name('event');
Route::get('upcoming-event',[EventController::class,'upEventFrontendView'])->name('up.event');
Route::get('previous-event',[EventController::class,'previousEventFrontendView'])->name('previous.event');
Route::get('events/{id}',[EventController::class,'eventDetails'])->name('event.details');
Route::get('notices',[NoticeController::class,'noticeFrontendView'])->name('notice');
Route::get('/notices/{notice}/download', [NoticeController::class,'download'])->name('notices.download');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('gallery',GalleryController::class);
    Route::resource('settings',SettingController::class);
    Route::resource('home',HomeController::class);
    Route::resource('about',AboutController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('event',EventController::class);
    Route::resource('notice',NoticeController::class);
});
