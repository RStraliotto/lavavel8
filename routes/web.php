<?php
use App\Http\Controllers\ContatoController;
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


Auth::routes();

//Route::get('/list', [App\Http\Controllers\HomeController::class, 'index'])->name('list');

Route::group(['middleware' => 'web' ], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    Route::resource('/contato', ContatoController::class);
    //Route::resource('/listar', ContatoController::class);
    

});

Route::get('/listar', [App\Http\Controllers\ContatoController::class, 'create'])->name('/listar');




//Route::resource('listar', [App\Http\Controllers\ContatoController::class, 'index'])->name('listar');

