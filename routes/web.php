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

// HAcemos uso de nuestro controlador creado
// Route::get('/', 'TestController@welcome');

Auth::routes();

// Ruta para el buscador del home
Route::get('/search', 'SearchController@show');
// Ruta para mostrar las sugerencias en el buscador del home
Route::get('/products/json', 'SearchController@data');



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Ruta para mostrar la pgaina de los productos
Route::get('/products/{id}', 'ProductController@show');

// Ruta para mostrar la pagina de las Categorias
Route::get('/categories/{category}', 'CategoryController@show');


// Definimos la ruta para el carrito de compras
Route::post('/cart', 'CartDetailController@store');
// Ruta para eliminar los productos del carrito
Route::delete('/cart', 'CartDetailController@destroy');

// Ruta para agregar el carrito
Route::post('/order', 'CartController@update');

// Ruta para Mostrar el Carrito pedido por el usuario
Route::get('/dashboard', 'UsersOrders@index');
Route::get('/order/{id}', 'UsersOrders@show');


Route::get('/home', function(){return Redirect::to('/dashboard');});
Route::get('/cart', function(){return Redirect::to('/dashboard');});
Route::get('/order', function(){return Redirect::to('/dashboard');});


// Auth::routes();


Route::middleware(['auth' , 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::get('/products', 'ProductController@index'); // Mostrar, el listado de los productos
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

	// Creamos las rutas para administrar las categorias
	Route::get('/categories', 'CategoryController@index'); // Mostrar, el listado de los productos-.
	Route::get('/categories/create', 'CategoryController@create'); // Mostrara un formulario para Crear Nuevos productos
	Route::post('/categories', 'CategoryController@store'); // Permitira  registrar los datos cargados en el formulario
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // Formulario de Edición
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // Actualizar los Datos
    Route::delete('/categories/{category}', 'CategoryController@destroy'); // Formulario para Eliminar
	// Route::delete('/categories/{id}', 'CategoryController@destroy'); // Formulario para Eliminar


	// Creamos las rutas para administrar los carritos Solicitados
    Route::get('/orders', 'OrdersController@index'); // Mostrar, el listado de los pedidos Pendientes.
    Route::get('/orders/confirmed', 'OrdersController@confirmed'); // Mostrar, el listado de los pedidos Confiramdos.
    Route::get('/orders/canceled', 'OrdersController@canceled'); // Mostrar, el listado de los pedidos Cancelados.
    // Route::delete('/orders/{id}', 'OrdersController@destroy'); // Formulario para Eliminar
    Route::get('/orders/{id}', 'OrdersController@show'); // Ver el Pedido
    Route::get('/orders/{id}/edit', 'OrdersController@edit'); // Formulario de Edición
    Route::post('/orders/{id}/edit', 'OrdersController@update'); // Actualizar los Datos


});

