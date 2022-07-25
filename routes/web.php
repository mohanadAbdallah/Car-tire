<?php

use App\Http\Controllers\AddCarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyLinkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TireController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\RoleController;
use \App\Http\Controllers\Admin\CustomersController;
use \App\Http\Controllers\Admin\ShelfController;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    ], function(){

Route::get('/', function () {
    return view('auth.login');
});
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->middleware('auth')->name('verification.notice');

Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group(['middleware' => ['auth']], function() {
//user
        Route::resource('users',UserController::class);
        Route::get('/show/profile', [UserController::class, 'showProfile'])->name('show.profile');
        Route::post('/update/profile', [UserController::class, 'updateProfile'])->name('update.profile');

//order
            Route::resource('orders',OrderController::class);
            Route::get('/fetch-tire',[OrderController::class,'fetchTire']);
            Route::get('/fetch-door',[OrderController::class,'fetchDoor']);

// Add Car
            Route::resource('add-car',AddCarController::class);

//shelf
            Route::resource('shelf',ShelfController::class);
//Tires
            Route::resource('tire',TireController::class);

//select car from customer
            Route::get('customers/cars/{id}', [CustomersController::class,'customer_car'])->name('customers.cars');

//roles
        Route::resource('roles',RoleController::class);

//Customer
        Route::resource('customers', CustomersController::class);
        Route::get('/customers/export/excel', [CustomersController::class,'export'])->name('customers.export.excel');
        Route::get('/customers/print/data', [CustomersController::class,'printCustomerData'])->name('customers.print.data');
        Route::get('/fetch-customer',[AddCarController::class,'fetchCustomer']);
//car
            Route::resource('car', \App\Http\Controllers\CarController::class);

//Company & Company Links
            Route::resource('companies',CompanyController::class);
            Route::resource('company_links',CompanyLinkController::class);

    });

});
