<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistorialController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('historial', HistorialController::class);

Route::get('cargardataciudad', [HistorialController::class, 'cargardataciudad']);
Route::get('indexciudades', [HistorialController::class, 'indexciudades']);
