<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller("login", "LoginController");

Route::group([ "prefix" => "inicio", "before" => "auth"], function(){
	Route::get("/", function(){
		return View::make("inicio");
	});
});

Route::group([ "prefix" => "api", "before" => "auth"], function(){
	Route::controller("picture", "PictureController");
	Route::controller("user", "UserController");
});

Route::group([ "prefix" => "common"], function(){
	Route::controller("state", "StateController");
	Route::controller("city", "CityController");
});

Route::get('/', ["before" => "basic", function(){
	return Redirect::to("inicio");
}]);