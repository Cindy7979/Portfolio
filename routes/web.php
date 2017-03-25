<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/docs/{file?}', 'HomeController@showResume')->name('show_resume');

Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/{id}', 'HomeController@show')->name('show');



Route::get('docs/{file?}', function($file = null) {
	// 라우터에서 이름을 받아서 모델에 요청
	$text = (new App\Documentation)->get($file);
	return app(ParsedownExtra::class)->text($text);
});
