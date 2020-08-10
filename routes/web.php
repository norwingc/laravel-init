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

Route::get('/test', function(){
	$user = \App\Models\User::with('personal_information')->find(1);
});

Route::get('/saludos/{date_one?}/{date_two?}', function($date_one = null, $date_two = null){
});

Route::get('/', 'HomeController@index')->name('home');

Route::view('/register', 'register');
Route::post('/register', 'UserController@register')->name('register');

Route::view('/login', 'login');
Route::post('/login', 'UserController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/Pokemon/{id}', function($id){
        return view('pokemon-show', compact('id'));
	});

	Route::get('/logout', 'UserController@logout');

	Route::get('/Pokemon/Information/{PokemonInformation}', 'PokemonInformationController@get');
	Route::post('/Pokemon/Information/update/{PokemonInformation?}', 'PokemonInformationController@store');

	Route::get('/Comments/get/{PokemonInformation}', 'PokemonCommentController@get');
	Route::post('/Comments/store/{PokemonInformation}', 'PokemonCommentController@store');

    Route::get('/edit', 'UserPersonalInformationController@edit')->name('user.edit');
	Route::post('/edit', 'UserPersonalInformationController@store')->name('user.edit.save');

});
