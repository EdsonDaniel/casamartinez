<?php

use Illuminate\Support\Facades\Route;

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

/* sitio principal*/
Route::get('/', function () {
    return view('index');
});

Route::get('/filosofia', function () {
    return view('filosofia');
});

Route::get('/historia', function () {
    return view('historia');
});

Route::get('/campos-de-maguey', function () {
    return view('campos');
});

Route::get('/certificaciones', function () {
    return view('certificaciones');
});


Route::get('/productos', function () {
    return view('productos');
});


Route::get('/catalogo', 'UserController@mercadopago');

Route::get('/carrito', function () {
    return view('carrito');
});






Route::get('/dash', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Grupo de rutas protegidas por un moddleware
/*Route::middleware(['auth'])->group(function () {
   
/*Route::post('products/store', 'ProductController@store')->name('products.store')
                                                        ->middleware('permission:products.create');
    Route::get('products', 'ProductController@index')->name('products.index')
                                                        ->middleware('permission:products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create')
                                                        ->middleware('permission:products.create');
    Route::put('products/{role}', 'ProductController@update')->name('products.update')
                                                        ->middleware('permission:products.edit');
    Route::get('products/{role}', 'ProductController@show')->name('products.show')
                                                        ->middleware('permission:products.show');
    Route::delete('products/{role}', 'ProductController@destroy')->name('products.destroy')
                                                        ->middleware('permission:products.destroy'); *
    Route::get('products/', 'HomeController@index2')->name('users.edit')
    	->middleware('permission:users.edit');
});*/


//Rutas para el dashboard de administrador

Route::get('/admin', function(){
    return view('admin/ventas');
})->name('admin');


Route::get('/admin/users', function(){
    return view('admin/usuarios');
})->name('usuarios');


Route::post('/agregar-al-carrito','UserController@addToCar');



//*****************************************rutasd Crud productos***************************/
Route::get('/admin/productos', 'ProductosController@index'); 
Route::get('/admin/productos/agregar', 'ProductosController@create');
Route::post('/admin/productos/guardar','ProductosController@store');

Route::get('/admin/productos/detalles/{id}','ProductosController@show');

Route::post('/admin/productos/update/{id}','ProductosController@updateProduct');
Route::post('/admin/productos/update_caracteristicas/{id}','ProductosController@updateCaractProduct');
Route::post('/admin/productos/update_presentacion/{id_pres}','ProductosController@updatePresentacion');
Route::post('/admin/productos/add_presentaciones/{id}','ProductosController@addPresentaciones');

Route::post('/admin/productos/delete/{id}','ProductosController@destroyProducto');
Route::post('/admin/productos/delete_caracteristicas/{id}','ProductosController@deleteCaractProduct');
Route::post('/admin/productos/delete_presentacion/{id_pres}','ProductosController@destroyPresentacion');


Route::get('/admin/productos/ajax', 'ProductosController@getDataAjax');
/****************************************** CRUD PRODUCTOS ***************************************/



//*****************************************rutasd Crud caracteristicas***************************/
Route::get('/admin/caracteristicas', 'CaracteristicasController@index'); 

//rutas para agregar caracteristicas adicionales a un producto
Route::post('/admin/caracteristicas/', 'CaracteristicasController@store');
//ruta para actualizar una caracteristica especifica
Route::post('/admin/caracteristicas/update/{id}', 'CaracteristicasController@update');
//ruta para eliminar una caracteristica especifica
Route::post('/admin/caracteristicas/delete/{id}', 'CaracteristicasController@destroy');

//rutas obtener datos de caracteristicas mediante AJAX
Route::get('/admin/caracteristicas/ajax', 'CaracteristicasController@getDataAjax');
Route::get('/admin/caracteristicas/ajax/{id_caract}', 'CaracteristicasController@getDataById');

//*****************************************rutasd Crud caracteristicas***************************/


//*****************************************rutasd Crud usuarios***************************/
//lista de usuarios
Route::get('/admin/usuarios', 'UserController@index'); 
//Detalles de un usuario
Route::get('/admin/usuarios/detalles/{id}', 'UserController@show'); 
//ruta para crear un usuario ****
Route::get('/admin/usuarios/agregar', 'UserController@create'); 
Route::post('/admin/usuarios/store', 'UserController@store');
//rutas para actualizar una usuario especifica
//Route::get('/admin/usuarios/update/{id}', 'UserController@update');
Route::post('/admin/usuarios/update/{id}', 'UserController@update');

//ruta para baja de un usuario
//Route::post('/admin/usuarios/delete/{id}', 'UserController@destroy');
Route::post('/admin/usuarios/baja/{id}', 'UserController@baja');
//ruta para alta de un usuario
Route::post('/admin/usuarios/alta/{id}', 'UserController@alta');

//rutas obtener datos de usuario mediante AJAX
Route::get('/admin/usuarios/activos/ajax', 'UserController@getDataAjaxActive');
Route::get('/admin/usuarios/inactivos/ajax', 'UserController@getDataAjaxInactive');
Route::get('/admin/usuarios/ajax/{id}', 'UserController@getDataById');

//*****************************************rutasd Crud usuarios***************************/
