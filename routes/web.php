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

// Route::get('/prueba', function () {
//     return ('Soy una Pruebanga en Laravel 5.7');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Ruta para mostrar la pgaina de los productos
Route::get('/products/{id}', 'ProductController@show');


// Definimos la ruta para el carrito de compras 
Route::post('/cart', 'CartDetailController@store');
// Ruta para eliminar los productos del carrito
Route::delete('/cart', 'CartDetailController@destroy');

// Ruta para agregar el carrito
Route::post('/order', 'CartController@update');


// Mis rutas para realiar los CRUD
// PEticiones GET para consultar info - Leer info
// Peticiones POST cuando queremos REgistrar, Actualizar informacion - Influir info
// 
// Los Metodos index, create, y store son usados por varios framwwork pro convenccion
// Index devolvera un listado
// Create devolvera un formulario 
// Store Guardara los datos que el usuario gaurda en el formulario

// CR 
// Route::get('/admin/products', 'ProductController@index'); // Mostrar, el listado de los productos-.
// Route::get('/admin/products/create', 'ProductController@create'); // Mostrara un formulario para Crear Nuevos productos
// Route::post('/admin/products', 'ProductController@store'); // Permitira  registrar los datos cargados en el formulario

// // Rutas Neuvas
// Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // Formulario de Edición
// Route::post('/admin/products/{id}/edit', 'ProductController@update'); // Actualizar los Datos


// // En laravle se usa el motodo post para eliminar
// // Route::get('/admin/products/{id}/delete', 'ProductController@destroy'); // Formulario para Eliminar
// // Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); // Formulario para Eliminar

// // Usando el verbo delete
// Route::delete('/admin/products/{id}', 'ProductController@destroy'); // Formulario para Eliminar
// 
// 
// Usamos el middleware para validar la autentificacion
// 

// Route::middleware(['auth' , 'admin'])->prefix('admin')->group(function(){
Route::middleware(['auth' , 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
Route::get('/products', 'ProductController@index'); // Mostrar, el listado de los productos-.
Route::get('/products/create', 'ProductController@create'); // Mostrara un formulario para Crear Nuevos productos
Route::post('/products', 'ProductController@store'); // Permitira  registrar los datos cargados en el formulario
Route::get('/products/{id}/edit', 'ProductController@edit'); // Formulario de Edición
Route::post('/products/{id}/edit', 'ProductController@update'); // Actualizar los Datos
Route::delete('/products/{id}', 'ProductController@destroy'); // Formulario para Eliminar

// Rutas para gestionar el control de las Imagenes 
Route::get('/products/{id}/images', 'ImageController@index'); // Listado
Route::post('/products/{id}/images', 'ImageController@store'); // Registrar
Route::delete('/products/{id}/images' ,'ImageController@destroy'); // Formulario para Eliminar
// Ruta para destacar imagen del producto 
Route::get('/products/{id}/images/select/{image}' ,'ImageController@select'); // Seleccionar Iamgen Destacada

});

