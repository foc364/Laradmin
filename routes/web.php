<?php
use Larashop\Models\Config;
use Larashop\Models\Place;
use Larashop\Formatters\PhoneNumber;
use Illuminate\Http\Request;

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
Route::resource('/', 'Site\SiteController');
//////////////////**SITE**///////////////


/////////////////**ADMIN**//////////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('usuarios', 'UsersController');
    Route::resource('consultorios', 'PlacesController');
    Route::resource('convenios', 'HealthInsurancesController');
    Route::resource('agendamentos', 'SchedulesController');
    Route::resource('configuracoes', 'ConfigsController');
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

//////////////////**REQUISIÇÕES**///////////////

Route::post('site-requests', function (Request $request) {
    $app = app();
    $controller = $app->make('Larashop\Http\Controllers\Site\SiteController');

    return $controller->callAction($request->action, [$request]);
});

Route::post('admin-requests', function (Request $request) {
    $app = app();
    $controller = $app->make('Larashop\Http\Controllers\Admin\RequestsController');

    return $controller->callAction($request->action, [$request]);
});
//////////////////**REQUISIÇÕES**///////////////

