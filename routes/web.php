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

// Route::get('/', function () {
//     return view('welcome');
// });

// HAcemos uso de nuestro controlador creado
Route::get('/', 'TestController@welcome');

Route::get('/prueba', function () {
    return ('Soy una Pruebanga en Laravel 5.7');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
