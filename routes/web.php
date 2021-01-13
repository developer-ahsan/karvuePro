<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAccounts;
use App\Http\Controllers\Commercialfleet;
use App\Http\Controllers\Designer;
use App\Http\Controllers\CustomerPortal;
use App\Http\Controllers\Printer;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Advertisers;

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
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/advertiser', function () {
	return view('advertiser');
});
Route::get('/driver', function () {
	return view('driver');
});
Route::post('register', [UserAccounts::class, 'register']);
Route::get('fleet-register', function () {
	return view('ComercialFleet.register');
});
Route::get('designer-register', function () {
	return view('Designer.register');
});
Route::post('registerdesigner', [Designer::class, 'register']);
Route::post('registerfleet', [Commercialfleet::class, 'register']);

// Advertiser Portal
Route::get('customer-register', function () {
	return view('CustomerPortal.register');
});
Route::post('registercustomer', [CustomerPortal::class, 'register']);
// Printer Portal
Route::get('print-register', function () {
	return view('Print.register');
});
Route::get('about', function () {
	return view('about');
});
Route::get('contact', function () {
	return view('contact');
});
Route::post('registerprintingpress', [Printer::class, 'register']);

Route::post('logins', [UserAccounts::class, 'Userlogin']);

Route::get('dashboard', [Dashboard::class, 'dashboard']);
Route::get('logout', [Dashboard::class, 'logout']);
Route::get('forgetpassword', [UserAccounts::class, 'forgetpassword']);
Route::post('resetpassword', [UserAccounts::class, 'resetpassword']);
Route::get('resetpassword/{email}', [UserAccounts::class, 'resetpasswordEmail']);
Route::post('resetpasswords', [UserAccounts::class, 'resetpasswordEmails']);

Route::group(['prefix'=>'dashboard'], function(){
	Route::get('updatePassword', [Dashboard::class, 'updatePasswordView']);
	Route::post('updatePassword', [Dashboard::class, 'updatePassword']);
	Route::get('updateProfile', [Dashboard::class, 'updateProfileView']);
	Route::post('updateProfile', [Dashboard::class, 'updateProfile']);
	Route::get('worksamples', [Dashboard::class, 'worksamples']);
	// Advertisers
	Route::get('fleetoperators', [Advertisers::class, 'fleetoperators']);
	Route::get('fleetoperators/{id}', [Advertisers::class, 'fleetoperatorsBYID']);
	Route::get('servicearea', [Commercialfleet::class, 'servicearea']);
	Route::post('submitdestination', [Commercialfleet::class, 'submitdestination']);
	Route::post('submitwaypoints', [Commercialfleet::class, 'submitwaypoints']);
});
