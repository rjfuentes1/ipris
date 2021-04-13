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

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::resources([
        'people' => 'PersonController',
        'ethnicities' => 'EthnicityController',
        'communities' => 'CommunityController'
    ]);
    
});

Route::get('/getProvince', 'HomeController@getProvince')->name('getProvince');
Route::get('/getMunicipality', 'HomeController@getMunicipality')->name('getMunicipality');
Route::get('/getBarangay', 'HomeController@getBarangay')->name('getBarangay');
Route::get('/getLeader', 'HomeController@getLeader')->name('getLeader');
Route::get('/getHead', 'HomeController@getHead')->name('getHead');
Route::post('/filter', 'HomeController@filter')->name('filter');
