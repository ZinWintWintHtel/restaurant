<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/review', function () {
    return view('review');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/contact', function () {
    return view('contact');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/****************Manager Routes ****************/
Route::prefix('manager')->group(function(){

Route::get('/login',[ManagerController::class,'index'])->name('manager.login_form');
Route::get('/login/owner',[ManagerController::class,'login'])->name('manager.login');
Route::get('/dashboard',[ManagerController::class,'dashboard'])->name('manager.dashboard');
Route::get('/logout',[ManagerController::class,'logout'])->name('manager.logout');


});
