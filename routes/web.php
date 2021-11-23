<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('properties', [ApartmentController::class,'index'])->name('properties');
Route::get('properties/{slug}', [ApartmentController::class,'detail'])->name('property.detail');
Route::get('city/{slug}', [ApartmentController::class,'city'])->name('property.city');
Route::get('search', [ApartmentController::class,'search'])->name('apartment.search');
Route::get('news', [MediaController::class,'news'])->name('news');
Route::get('categories/{slug}', [MediaController::class,'category'])->name('news.category');
Route::get('tags/{slug}', [MediaController::class,'tag'])->name('news.tag');
Route::get('news/{slug}', [MediaController::class,'detail'])->name('news.detail');
Route::post('comment', [MediaController::class,'comment'])->name('news.comment');
Route::get('search/news', [MediaController::class,'search'])->name('news.search');
Route::get('contact', [MediaController::class,'contact'])->name('contact');
Route::post('contact', [MediaController::class,'store'])->name('contact.store');
Route::post('message/apartment', [ApartmentController::class,'message']);
Route::get('page-not-found', function () {
    return view('errors.404');
})->name('errors');

Route::prefix('user')->group(function () {
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('user.dashboard');
    Route::get('property',[HomeController::class,'property'])->name('user.property');
    Route::post('property',[HomeController::class,'store'])->name('user.store');
    Route::get('profile',[HomeController::class,'profile'])->name('user.profile');
    Route::put('profile/update',[HomeController::class,'update'])->name('user.update');
    Route::get('changepwd',[HomeController::class,'changepwd'])->name('user.changepwd');
    Route::put('change',[HomeController::class,'change'])->name('user.change');
    Route::delete('destroy/{id}',[HomeController::class,'destroy'])->name('user.destroy');
});

Auth::routes();

Route::middleware(['authadmin', 'auth'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('property',PropertyController::class);
    Route::resource('category',CategoryController::class)->except(['show']);
    Route::resource('tag',TagController::class)->except(['show']);
    Route::resource('post',PostController::class);
    Route::get('setting',[DashboardController::class,'setting'])->name('setting');
    Route::put('setting',[DashboardController::class,'store'])->name('setting.store');
    Route::get('admin/profile',[DashboardController::class,'adminProfile'])->name('admin.profile');
    Route::put('admin/profile',[DashboardController::class,'profile'])->name('admin.profile.store');
    Route::get('admin/password',[DashboardController::class,'password'])->name('admin.password');
    Route::put('admin/update-pwd',[DashboardController::class,'update'])->name('admin.password.update');
    Route::get('admin/message',[DashboardController::class,'message'])->name('admin.message');
    Route::get('admin/guest',[DashboardController::class,'guest'])->name('admin.guest');
    Route::resource('guest', DashboardController::class);
});

