<?php 

// Route::group(['middleware' => ['RoleAuthenticate']], function () {
	Route::get('admintemplate', [
	    'uses' => 'AdminTemplateController@index',
	    'is_display' => 0,
	]);
// });
