<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

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


Route::get("/empleados", [EmpleadosController::class, "index"])->name('lista-empleados');
Route::get("/empleado/detalle/{id}", [EmpleadosController::class, "detalle"])->name('detalle-empleado');
Route::post("/empleado/guardar", [EmpleadosController::class, "guardar"])->name('guardar-empleado');
Route::post("/empleado/nuevo", [EmpleadosController::class, "nuevo"])->name('nuevo-empleado');
Route::post("/empleado/editar/{id}", [EmpleadosController::class, "nuevo"])->name('editar-empleado');
Route::post("/empleado/borrar/{id}", [EmpleadosController::class, "nuevo"])->name('borrar-empleado');