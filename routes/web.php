<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PaymentConfirmController;
use App\Http\Controllers\CustomerFeedbackController;
use App\Http\Controllers\RestaurantDetailController;



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



Route::get('/', [RestaurantDetailController::class,'welcome'])->name('/');
Route::get('/about', [RestaurantDetailController::class,'about']);
Route::get('/services', [RestaurantDetailController::class,'services']);
Route::get('/review', [RestaurantDetailController::class,'review']);
Route::get('/gallery', [RestaurantDetailController::class,'gallery']);
Route::get('/contact', [RestaurantDetailController::class,'contact']);


Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/payment',[HomeController::class,'paymentHistory'])->name('payment_history');
Route::get('/home/payment/paymentscreenshot',[HomeController::class,'viewPaymentScreenshot'])->name('view_payment_screenshot');
Route::get('/home/show/profile',[UserController::class,'show'])->name('profile_show')->middleware('auth');
Route::get('/home/update/profile',[UserController::class,'showUpdateForm'])->name('profile_update_form')->middleware('auth');
Route::post('/home/update/profile',[UserController::class,'update'])->name('profile_update')->middleware('auth');
Route::get('/home/update/password',[UserController::class,'showPasswordUpdateForm'])->name('password_update_form')->middleware('auth');
Route::post('/home/update/password',[UserController::class,'changePassword'])->name('change_password')->middleware('auth');
Route::get('/home/feedback',[HomeController::class,'feedback'])->name('user.feedback');
Route::get('/home/feedback/form',[CustomerFeedbackController::class,'feedBackForm'])->name('feedback_form')->middleware('auth');
Route::post('/home/feedback',[CustomerFeedbackController::class,'store'])->name('feedback.store')->middleware('auth');


Route::get('/logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/make/reservation',[ReservationController::class,'showReservationForm'])->name('reservation_form')->middleware('auth');
Route::post('/make/reservation',[ReservationController::class,'store'])->name('reservation.store')->middleware('auth');
Route::post('/make/payment',[PaymentController::class,'store'])->name('payment.store')->middleware('auth');



/****************Manager Routes ****************/


Route::prefix('manager')->group(function(){

Route::get('/login',[ManagerController::class,'index'])->name('manager_login_form');
Route::get('/login/owner',[ManagerController::class,'login'])->name('manager.login');
Route::get('/dashboard',[ManagerController::class,'dashboard'])->name('manager.dashboard')->middleware('manager');
Route::get('/logout',[ManagerController::class,'logout'])->name('manager.logout')->middleware('manager');
Route::get('/profile',[ManagerController::class,'profile'])->name('manager.profile')->middleware('manager');
Route::get('/profile/update',[ManagerController::class,'showUpdateForm'])->name('manager.update_profile_form')->middleware('manager');
Route::post('/profile/update',[ManagerController::class,'updateProfile'])->name('manager.update_profile')->middleware('manager');
Route::get('/change/password',[ManagerController::class,'changePasswordForm'])->name('manager.change_password_form')->middleware('manager');
Route::post('/change/password',[ManagerController::class,'changePassword'])->name('manager.change_password')->middleware('manager');

Route::get('/paymentmethod',[PaymentMethodController::class,'index'])->name('manager.paymentmethod')->middleware('manager');
Route::get('/paymentmethod/create',[PaymentMethodController::class,'create'])->name('manager.paymentmethod_create')->middleware('manager');
Route::post('/paymentmethod/store',[PaymentMethodController::class,'store'])->name('manager.paymentmethod_store')->middleware('manager');
Route::get('/paymentmethod/show',[PaymentMethodController::class,'show'])->name('manager.paymentmethod_update_form')->middleware('manager');
Route::post('/paymentmethod/update',[PaymentMethodController::class,'update'])->name('manager.paymentmethod_update')->middleware('manager');
Route::get('/paymentmethod/delete',[PaymentMethodController::class,'delete'])->name('manager.paymentmethod_delete')->middleware('manager');


Route::get('/fee',[FeeController::class,'index'])->name('manager.fee')->middleware('manager');
Route::get('/fee/create',[FeeController::class,'create'])->name('manager.fee_create')->middleware('manager');
Route::post('/fee/store',[FeeController::class,'store'])->name('manager.fee_store')->middleware('manager');
Route::get('/fee/show',[FeeController::class,'show'])->name('manager.fee_show')->middleware('manager');
Route::post('/fee/update',[FeeController::class,'update'])->name('manager.fee_update')->middleware('manager');
Route::get('/fee/delete',[FeeController::class,'delete'])->name('manager.fee_delete')->middleware('manager');

Route::get('/staff',[StaffController::class,'index'])->name('manager.staff')->middleware('manager');
Route::get('/staff/create',[StaffController::class,'create'])->name('manager.staff_create')->middleware('manager');
Route::post('/staff/create',[StaffController::class,'store'])->name('manager.staff_store')->middleware('manager');
Route::get('/staff/show',[StaffController::class,'show'])->name('manager.staff_update_form')->middleware('manager');
Route::post('/staff/update',[StaffController::class,'update'])->name('manager.staff_update')->middleware('manager');
Route::get('/staff/delete',[StaffController::class,'delete'])->name('manager.staff_delete')->middleware('manager');



Route::get('/info',[RestaurantDetailController::class,'index'])->name('manager.info')->middleware('manager');

Route::get('/report/reservation/count',[ManagerController::class,'showReservationCountReport'])->name('manager.reservation_count_report')->middleware('manager');
Route::get('/report/reservation/guest/count',[ManagerController::class,'showReservationGuestCountReport'])->name('manager.reservation_guest_count_report')->middleware('manager');
Route::get('/report/reservation/guest/monthly/report',[ManagerController::class,'showCustomerMonthlyReport'])->name('manager.monthly_guest_count_report')->middleware('manager');
Route::get('/view/reservation/date',[ManagerController::class,'viewReservation'])->name('manager.view_reservation')->middleware('manager');
Route::get('/view/reservation',[ManagerController::class,'viewReservationDetails'])->name('manager.view_reservation_details')->middleware('manager');
Route::get('/view/customer/feedback',[CustomerFeedbackController::class,'index'])->name('manager.customer_feedback')->middleware('manager');
Route::get('/view/customer/feedback/month',[CustomerFeedbackController::class,'monthCustomerFeedback'])->name('manager.monthly_customer_feedback')->middleware('manager');

});

Route::get('/restaurant/show/{id}',[RestaurantDetailController::class,'show'])->name('restaurant.show')->middleware('manager');
Route::post('/restaurant/show/{id}',[RestaurantDetailController::class,'update'])->name('restaurant.update')->middleware('manager');


/****************End Manager Routes ****************/

/****************Staff Routes ****************/
Route::prefix('staff')->group(function(){

Route::get('/login',[StaffController::class,'showLoginForm'])->name('staff_login_form');
Route::get('/login/owner',[StaffController::class,'login'])->name('staff.login');
Route::get('/dashboard',[StaffController::class,'dashboard'])->name('staff.dashboard')->middleware('staff');
Route::get('/logout',[StaffController::class,'logout'])->name('staff.logout')->middleware('staff');
Route::get('/profile',[StaffController::class,'profile'])->name('staff.profile')->middleware('staff');
Route::get('/profile/update',[StaffController::class,'showUpdateProfileForm'])->name('staff.update_profile_form')->middleware('staff');
Route::post('/profile/update',[StaffController::class,'updateProfile'])->name('staff.update_profile')->middleware('staff');
Route::get('/update/password',[StaffController::class,'showUpdatePasswordForm'])->name('staff.update_password_form')->middleware('staff');
Route::post('/update/password',[StaffController::class,'updatePassword'])->name('staff.change_password')->middleware('staff');
Route::get('/serve/reservation',[StaffController::class,'staffReservation'])->name('staff.serve_reservation')->middleware('staff');

Route::get('/customers',[UserController::class,'viewCustomer'])->name('staff.view_customers')->middleware('staff');
Route::get('/customers/search',[UserController::class,'searchByEmail'])->name('staff.search_customer')->middleware('staff');
Route::get('/table',[TableController::class,'index'])->name('staff.table_index')->middleware('staff');
Route::get('/table/create',[TableController::class,'create'])->name('staff.table_create')->middleware('staff');
Route::post('/table/store',[TableController::class,'store'])->name('staff.table_store')->middleware('staff');
Route::get('/table/show',[TableController::class,'show'])->name('staff.table_show')->middleware('staff');
Route::post('/table/update',[TableController::class,'update'])->name('staff.table_update')->middleware('staff');
Route::get('/table/delete',[TableController::class,'delete'])->name('staff.table_delete')->middleware('staff');
Route::get('/reservation',[ReservationController::class,'index'])->name('staff.reservation_index')->middleware('staff');
Route::get('/reservation/search',[ReservationController::class,'searchByDate'])->name('staff.reservation_search')->middleware('staff');
Route::get('/reservation/delete',[ReservationController::class,'delete'])->name('staff.reservation_delete')->middleware('staff');
Route::get('/reservation/view',[ReservationController::class,'show'])->name('staff.reservation_details')->middleware('staff');
Route::get('/today/reservation/view',[ReservationController::class,'view'])->name('staff.reservation_view');
Route::get('/reservation/update',[ReservationController::class,'showUpdateForm'])->name('staff.reservation_update_form')->middleware('staff');
Route::post('/reservation/update',[ReservationController::class,'update'])->name('staff.reservation_update')->middleware('staff');
Route::get('/payment/view',[PaymentController::class,'show'])->name('staff.payment_view')->middleware('staff');
Route::get('/payment/confirm',[PaymentConfirmController::class,'edit'])->name('staff.payment_confirm_edit')->middleware('staff');
Route::post('/payment/confirm',[PaymentConfirmController::class,'store'])->name('staff.payment_confirm_store')->middleware('staff');





});
/****************End Staff Routes ****************/


