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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'institution'], function () {
	Route::get('/', [
	    'as' => 'institution_index',
	    'uses' => 'InstitutionController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::get('/create', [
	    'as' => 'institution_create',
	    'uses' => 'InstitutionController@create',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::post('/create', [
	    'as' => 'institution_create_action',
	    'uses' => 'InstitutionController@createAction',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::get('/edit/{id?}', [
	    'as' => 'institution_edit',
	    'uses' => 'InstitutionController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::post('/edit/{id?}', [
	    'as' => 'institution_edit_action',
	    'uses' => 'InstitutionController@editAction',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::any('/delete/{id?}', [
	    'as' => 'institution_delete',
	    'uses' => 'InstitutionController@Delete',
	    'parent' => 'setting_parent',
	    'name' => 'Institution',
	    'icon' => '',
	    'description' => 'Institution',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institution',
	]);
	Route::get('/status/{id}', [
	    'as' => 'institution_status',
	    'uses' => 'InstitutionController@Status',
	    'parent' => 'setting_parent',
	    'name' => 'institution Status',
	    'icon' => '',
	    'description' => 'institution Status',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'institution',
	    'wrap_group_level' => 'institutions',
	]);
});

Route::group(['prefix' => 'package'], function () {
	Route::get('/', [
	    'as' => 'package_index',
	    'uses' => 'PackageController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::get('/create', [
	    'as' => 'package_create',
	    'uses' => 'PackageController@create',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::post('/create', [
	    'as' => 'package_create_action',
	    'uses' => 'PackageController@createAction',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::get('/edit/{id?}', [
	    'as' => 'package_edit',
	    'uses' => 'PackageController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::post('/edit/{id?}', [
	    'as' => 'package_edit_action',
	    'uses' => 'PackageController@editAction',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::get('/delete/{id?}', [
	    'as' => 'package_delete',
	    'uses' => 'PackageController@Delete',
	    'parent' => 'setting_parent',
	    'name' => 'Package',
	    'icon' => '',
	    'description' => 'Package',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::get('/status/{id}', [
	    'as' => 'package_status',
	    'uses' => 'PackageController@Status',
	    'parent' => 'setting_parent',
	    'name' => 'package Status',
	    'icon' => '',
	    'description' => 'package Status',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
	Route::get('/mapping/{id}', [
	    'as' => 'package_mapping',
	    'uses' => 'PackageController@Mapping',
	    'parent' => 'setting_parent',
	    'name' => 'package Mapping',
	    'icon' => '',
	    'description' => 'package Mapping',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'package',
	    'wrap_group_level' => 'package',
	]);
});

Route::group(['prefix' => 'msmetype'], function () {
	Route::get('/', [
	    'as' => 'msmetype_index',
	    'uses' => 'MsmetypeController@index',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::get('/create', [
	    'as' => 'msmetype_create',
	    'uses' => 'MsmetypeController@create',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::post('/create/{id?}', [
	    'as' => 'msmetype_create_action',
	    'uses' => 'MsmetypeController@createAction',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::get('/edit/{id?}', [
	    'as' => 'msmetype_edit',
	    'uses' => 'MsmetypeController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::post('/edit/{id?}', [
	    'as' => 'msmetype_edit_action',
	    'uses' => 'MsmetypeController@editAction',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::get('/delete/{id?}', [
	    'as' => 'msmetype_delete',
	    'uses' => 'MsmetypeController@Delete',
	    'parent' => 'setting_parent',
	    'name' => 'Msmetype',
	    'icon' => '',
	    'description' => 'Msmetype',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
	Route::get('/status/{id}', [
	    'as' => 'msmetype_status',
	    'uses' => 'MsmetypeController@Status',
	    'parent' => 'setting_parent',
	    'name' => 'msmetype Status',
	    'icon' => '',
	    'description' => 'msmetype Status',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'msmetype',
	    'wrap_group_level' => 'msmetype',
	]);
});

Route::group(['prefix' => 'user'], function () {
	Route::get('/', [
	    'as' => 'user_index',
	    'uses' => 'UserController@index',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 1,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::get('/create', [
	    'as' => 'user_create',
	    'uses' => 'UserController@create',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::post('/create', [
	    'as' => 'user_create_action',
	    'uses' => 'UserController@createAction',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::get('/edit/{id?}', [
	    'as' => 'user_edit',
	    'uses' => 'UserController@edit',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::post('/edit/{id?}', [
	    'as' => 'user_edit_action',
	    'uses' => 'UserController@editAction',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::get('/delete/{id?}', [
	    'as' => 'user_delete',
	    'uses' => 'UserController@Delete',
	    'parent' => 'setting_parent',
	    'name' => 'user',
	    'icon' => '',
	    'description' => 'user',
	    'is_display' => 0,
	    'is_active' => 1,
	    'order_id' => 1,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
	Route::get('/status/{id}', [
	    'as' => 'user_status',
	    'uses' => 'UserController@Status',
	    'parent' => 'setting_parent',
	    'name' => 'user Status',
	    'icon' => '',
	    'description' => 'user Status',
	    'is_active' => 1,
	    'order_id' => 0,
	    'wrap_group' => 'user',
	    'wrap_group_level' => 'user',
	]);
});
Route::group(['prefix' => 'farmer'], function () {
    Route::get('/', [
        'as' => 'farmer_index',
        'uses' => 'FarmerController@index',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 1,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    Route::get('/create', [
        'as' => 'farmer_create',
        'uses' => 'FarmerController@create',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    Route::post('/create', [
        'as' => 'farmer_create_action',
        'uses' => 'FarmerController@createAction',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    Route::get('/edit/{id?}', [
        'as' => 'farmer_edit',
        'uses' => 'FarmerController@edit',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    Route::post('/create/{id?}', [
        'as' => 'farmer_create',
        'uses' => 'FarmerController@submit',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    // Route::get('/edit/{id?}', [
    //     'as' => 'farmer_edit_action',
    //     'uses' => 'FarmerController@editAction',
    //     'parent' => 'setting_parent',
    //     'name' => 'Farmer',
    //     'icon' => '',
    //     'description' => 'Farmer',
    //     'is_display' => 0,
    //     'is_active' => 1,
    //     'order_id' => 1,
    //     'wrap_group' => 'farmer',
    //     'wrap_group_level' => 'farmer',
    // ]);
    Route::any('/delete/{id?}', [
        'as' => 'farmer_delete',
        'uses' => 'FarmerController@Delete',
        'parent' => 'setting_parent',
        'name' => 'Farmer',
        'icon' => '',
        'description' => 'Farmer',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
    Route::get('/status/{id}', [
        'as' => 'farmer_status',
        'uses' => 'FarmerController@Status',
        'parent' => 'setting_parent',
        'name' => 'Farmer Status',
        'icon' => '',
        'description' => 'Farmer Status',
        'is_active' => 1,
        'order_id' => 0,
        'wrap_group' => 'farmer',
        'wrap_group_level' => 'farmer',
    ]);
});

Route::group(['prefix' => 'msme'], function () {
    Route::get('/', [
        'as' => 'msme_index',
        'uses' => 'MsmeController@index',
        'parent' => 'setting_parent',
        'name' => 'Msme',
        'icon' => '',
        'description' => 'Msme',
        'is_display' => 1,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'msme',
        'wrap_group_level' => 'msme',
    ]);
    Route::get('/create', [
        'as' => 'msme_create',
        'uses' => 'MsmeController@create',
        'parent' => 'setting_parent',
        'name' => 'Msme',
        'icon' => '',
        'description' => 'Msme',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'msme',
        'wrap_group_level' => 'msme',
    ]);
    Route::post('/create/{id?}', [
        'as' => 'msme_create',
        'uses' => 'MsmeController@submit',
        'parent' => 'setting_parent',
        'name' => 'Msme',
        'icon' => '',
        'description' => 'Msme',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'msme',
        'wrap_group_level' => 'msme',
    ]);
    Route::get('/edit/{id?}', [
        'as' => 'msme_edit',
        'uses' => 'MsmeController@edit',
        'parent' => 'setting_parent',
        'name' => 'Msme',
        'icon' => '',
        'description' => 'Msme',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'msme',
        'wrap_group_level' => 'msme',
    ]);
    Route::any('/delete/{id?}', [
        'as' => 'msme_delete',
        'uses' => 'MsmeController@Delete',
        'parent' => 'setting_parent',
        'name' => 'Msme',
        'icon' => '',
        'description' => 'Msme',
        'is_display' => 0,
        'is_active' => 1,
        'order_id' => 1,
        'wrap_group' => 'msme',
        'wrap_group_level' => 'msme',
    ]);
});

