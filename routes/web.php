<?php
use Larashop\Models\Config;
use Larashop\Models\Place;
use Larashop\Formatters\PhoneNumber;
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

    return view('/site/home')
        ->with('config', Config::find(1))
        ->with('placesFooter', Place::all())
        ->with('phoneNumber', new PhoneNumber);
})->name('/');

Route::get('orientacao', function () {
    
    return view('/site/orientation')
        ->with('config', Config::find(1))
        ->with('placesFooter', Place::all())
        ->with('phoneNumber', new PhoneNumber);
})->name('orientacao');

Route::get('quem-somos', function () {
    
    return view('/site/about')
        ->with('config', Config::find(1))
        ->with('placesFooter', Place::all())
        ->with('phoneNumber', new PhoneNumber);
})->name('quem-somos');

Route::get('localizacao', function () {

    return view('/site/allocation')
        ->with('config', Config::find(1))
        ->with('placesFooter', Place::all())
        ->with('phoneNumber', new PhoneNumber);
})->name('localizacao');

//Route::get('contato', 'Site\ContactController@index')->name('contato')->with($config);

//Route::post('contato', 'Site\ContactController@store')->name('contato.store');

Route::resource('contato', 'Site\ContactController');
//////////////////**SITE**///////////////


/////////////////**ADMIN**//////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('usuarios', 'UsersController');
    Route::resource('consultorios', 'PlacesController');
    Route::resource('convenios', 'HealthInsurancesController');
    Route::resource('agendamentos', 'SchedulesController');
    Route::resource('configuracoes', 'ConfigsController');
    Route::resource('configuracoes-home', 'ConfigsHomeController');
    Route::resource('configuracoes-quem-somos', 'ConfigsAboutController');
    Route::resource('configuracoes-orientacao', 'ConfigsOrientationController');
    Route::resource('configuracoes-contato', 'ConfigsContactController');

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

