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


	// FleetOperators
	Route::get('fleetvehicles', [Commercialfleet::class, 'fleetvehicles']);
	Route::get('fleetvehiclesdel/{id}', [Commercialfleet::class, 'fleetvehiclesdel']);
	Route::post('addnewVehicle', [Commercialfleet::class, 'addnewVehicle']);

	Route::get('workingHours', [Commercialfleet::class, 'workingHours']);
	Route::post('addnewworkingHours', [Commercialfleet::class, 'addnewworkingHours']);
	Route::get('workingHoursdel/{id}', [Commercialfleet::class, 'workingHoursdel']);

	Route::get('getWayPoints', [Commercialfleet::class, 'getWayPoints']);
	Route::get('wayPointsdel/{id}', [Commercialfleet::class, 'wayPointsdel']);


	// Designers
	Route::get('designSamples', [Designer::class, 'designSamples']);
	Route::post('addnewSample', [Designer::class, 'addnewSample']);
	Route::get('designSamplesdel/{id}', [Designer::class, 'designSamplesdel']);

	Route::get('activePrinters', [Dashboard::class, 'activePrinters']);
	Route::get('activeFleet', [Dashboard::class, 'activeFleet']);
	Route::get('activeDesigner', [Dashboard::class, 'activeDesigner']);
	Route::get('activeAdvertiser', [Dashboard::class, 'activeAdvertiser']);

	Route::get('workingHoursPrinter', [Printer::class, 'workingHours']);
	Route::post('addnewworkingHoursPrinter', [Printer::class, 'addnewworkingHours']);
	Route::get('workingHoursdelPrinter/{id}', [Printer::class, 'workingHoursdel']);

	Route::get('designerServicePlans', [Designer::class, 'designerServicePlans']);
	Route::post('addnewServicePlan', [Designer::class, 'addnewServicePlan']);
	Route::get('designerServicePlansdel/{id}', [Designer::class, 'designerServicePlansdel']);

	Route::get('fleetoperatorsdetail/{id}', [Dashboard::class, 'fleetoperatorsdetail']);

	Route::get('printersdetail/{id}', [Dashboard::class, 'printersdetail']);
	Route::get('advertiserdetail/{id}', [Dashboard::class, 'advertiserdetail']);
	Route::get('designerdetail/{id}', [Dashboard::class, 'designerdetail']);

	Route::get('adminfleets', [Dashboard::class, 'adminfleets']);
	Route::get('adminDesigner', [Dashboard::class, 'adminDesigner']);
	Route::get('adminPrinters', [Dashboard::class, 'adminPrinters']);
	Route::get('adminAdvertiser', [Dashboard::class, 'adminAdvertiser']);

	Route::get('adminfleetsdel/{id}', [Dashboard::class, 'adminfleetsdel']);
	Route::get('adminDesignerdel/{id}', [Dashboard::class, 'adminDesignerdel']);
	Route::get('adminPrintersdel/{id}', [Dashboard::class, 'adminPrintersdel']);
	Route::get('adminAdvertiserdel/{id}', [Dashboard::class, 'adminAdvertiserdel']);
	Route::get('createanAds', [Dashboard::class, 'createanAds']);
	Route::post('findfleetandprinter', [Dashboard::class, 'findfleetandprinter']);
	Route::get('adsView', [Dashboard::class, 'adsView']);

});
