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

use App\Models\PokemonInformation;

Route::get('/test', function(){
	$pokemon_informatino = PokemonInformation::with('comments')->find(1);
	return $pokemon_informatino;
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/Pokemon/{id}', function($id){
        return view('pokemon-show', compact('id'));
	});

	Route::get('/Pokemon/Information/{PokemonInformation}', 'PokemonInformationController@get');

	Route::get('/Comments/get/{PokemonInformation}', 'PokemonCommentController@get');
	Route::post('/Comments/store/{PokemonInformation}', 'PokemonCommentController@store');

    Route::get('/edit', 'UserPersonalInformationController@edit')->name('user.edit');
    Route::post('/edit', 'UserPersonalInformationController@store')->name('user.edit.save');
});
