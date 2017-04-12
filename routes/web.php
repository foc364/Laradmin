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


//////////////////**SITE**///////////////
Route::get('/', function () {
    dd();
    return view('/site/home');
})->name('/');

Route::get('orientacao', function () {
    return view('/site/orientation');
})->name('orientacao');

Route::get('quem-somos', function () {
    return view('/site/about');
})->name('quem-somos');

Route::get('localizacao', function () {
    return view('/site/allocation');
})->name('localizacao');

Route::get('contato', 'Site\ContactController@index')->name('contato');

Route::post('contato', 'Site\ContactController@store')->name('contato.store');
//////////////////**SITE**///////////////


/////////////////**ADMIN**//////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('usuarios', 'UsersController');
    Route::resource('consultorios', 'PlacesController');
    Route::resource('convenios', 'HealthInsurancesController');
    Route::resource('agendamentos', 'SchedulesController');

    Route::get('home', function () {
        return view('admin.home');
    })->name('home');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::get('logout', [
        'namespace' => 'Admin',
        'uses' => 'Auth\LoginController@logout'
    ]);
});

Route::get('/admin', function () {
    return redirect()->route('login');
})->name('admin');
/////////////////**ADMIN**//////////////////////
