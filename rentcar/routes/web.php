<?php

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

Route::prefix('/admin')->middleware(['isLoggedIn', 'isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\DashboardController@Index')->name('admin.dashboard');
    Route::post('/dashboard/sortDescActivity', 'Admin\DashboardController@sortDescActivity');
    Route::post('/dashboard/sortAscActivity', 'Admin\DashboardController@sortAscActivity');
    Route::post('/dashboard/sortDescAutentification', 'Admin\DashboardController@sortDescAutentification');
    Route::post('/dashboard/sortAscAutentification', 'Admin\DashboardController@sortAscAutentification');
    Route::resource('/reservation', 'Admin\ReservationsController');
    Route::resource('/cars_manager', 'Admin\CarsController');
    Route::post('/cars_manager/all', 'Admin\CarsController@getAll');
    Route::resource('/customer_manager', 'Admin\CustomersController');
    Route::resource('/acc_manager', 'Admin\AdminController');
    Route::post('/customer_manager/all', 'Admin\CustomersController@getAll');
    Route::put('/customer_manager', 'Admin\CustomersController@update');
    Route::put('/acc_manager', 'Admin\AdminController@update');
    Route::put('/cars_manager', 'Admin\CarsController@update');
});


Route::get('/', 'HomeController@Index')->name('home');
Route::get('/about', 'PageController@About')->name('about');
Route::get('/cars', 'CarsController@Index')->name('cars');
Route::get('/contact', 'ContactController@Index')->name('contact');
Route::get('/services', 'PageController@Services')->name('services');
Route::get('/reservation/{id}', 'ReservationController@Reservation')->where(['id' => '\d+'])->name('reservation')->middleware(['isLoggedIn', 'isCustomer']);
Route::post('/reservation', 'ReservationController@DoReservation')->name('doReservation')->middleware(['isLoggedIn']);
Route::get('/user', 'UserController@Index')->name('user');
Route::get('/deleteUser/{id}', 'UserController@Delete')->where(['id' => '\d+'])->name('deleteUser');
Route::post('/user', 'UserController@Update');
Route::get('/selectedUser', 'UserController@getUser')->name('user.getUser');
Route::post('cars/fetch', 'CarsController@Fetch')->name('paginationFetch');
Route::get('/contact/sendMail', 'ContactController@sendMail');

Route::get('/login', 'AuthController@Login')->name('login');
Route::post('/login', 'AuthController@DoLogin')->name('doLogin');
Route::get('/logout', 'AuthController@Logout')->name('logout')->middleware(['isLoggedIn']);
Route::get('/registration', 'AuthController@Registration')->name('registration');
Route::post('/registration', 'AuthController@DoRegistration')->name('doRegistration');
