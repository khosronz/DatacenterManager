<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});






Route::resource('ostypes', 'OstypeAPIController');

Route::resource('os', 'OsAPIController');

Route::resource('connectiontypes', 'ConnectiontypeAPIController');

Route::resource('organizations', 'OrganizationAPIController');

Route::resource('roles', 'RoleAPIController');









Route::resource('domains', 'DomainAPIController');



Route::resource('databasetypes', 'DatabasetypeAPIController');





Route::resource('provinces', 'ProvinceAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('locations', 'LocationAPIController');

Route::resource('vmtypes', 'VmtypeAPIController');

Route::resource('phonetypes', 'PhonetypeAPIController');

Route::resource('ipranges', 'IprangeAPIController');



Route::resource('phonebooks', 'PhonebookAPIController');

Route::resource('software', 'SoftwareAPIController');

Route::resource('portsoftwares', 'PortsoftwareAPIController');

Route::resource('webaddresses', 'WebaddressAPIController');

Route::resource('softwaredescs', 'SoftwaredescAPIController');





Route::resource('vms', 'VmAPIController');

Route::resource('connections', 'ConnectionAPIController');

Route::resource('databases', 'DatabaseAPIController');

Route::resource('softwareorganizations', 'SoftwareorganizationAPIController');





Route::resource('softwareusers', 'SoftwareuserAPIController');

Route::resource('roleusers', 'RoleuserAPIController');