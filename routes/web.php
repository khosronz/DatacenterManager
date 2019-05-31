<?php

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
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');





Route::resource('ostypes', 'OstypeController');

Route::resource('os', 'OsController');

Route::resource('connectiontypes', 'ConnectiontypeController');



Route::resource('organizations', 'OrganizationController');

Route::resource('roles', 'RoleController');









Route::resource('domains', 'DomainController');



Route::resource('databasetypes', 'DatabasetypeController');





Route::resource('provinces', 'ProvinceController');

Route::resource('cities', 'CityController');

Route::resource('locations', 'LocationController');

Route::resource('vmtypes', 'VmtypeController');

Route::resource('phonetypes', 'PhonetypeController');

Route::resource('ipranges', 'IprangeController');



Route::resource('phonebooks', 'PhonebookController');

Route::get('software/showdetails', 'SoftwareController@showdetails')->name('software.showdetails');
Route::resource('software', 'SoftwareController');


Route::resource('portsoftwares', 'PortsoftwareController');

Route::resource('webaddresses', 'WebaddressController');

Route::resource('softwaredescs', 'SoftwaredescController');





Route::resource('vms', 'VmController');

Route::resource('connections', 'ConnectionController');

Route::resource('databases', 'DatabaseController');

Route::resource('softwareorganizations', 'SoftwareorganizationController');





Route::resource('softwareusers', 'SoftwareuserController');

Route::resource('roleusers', 'RoleuserController');