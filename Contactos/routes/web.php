<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
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
Route::get('/pulic/{id}', [ContactoController::class,'visu']);
Route::get('/',[ContactoController::class,'index']);
Route::get('/sigle/{id}',[ContactoController::class,'ver'])->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[ContactoController::class,'admin'])->name('dashboard');
Route::get('/edit/{id}',[ContactoController::class,'upd'])->middleware('auth');

Route::get('rest',[ContactoController::class,'restauro'])->name('rest.restauro');
//ADMIN ÁREA
Route::prefix('/admin')->group(function (){
     
    Route::get('/',[ContactoController::class,'meus'])->middleware('auth');
    Route::get('/contactos',[ContactoController::class,'todos'])->middleware('auth');
    Route::get('/add',[ContactoController::class,'add'])->middleware('auth');
    Route::post('/add',[ContactoController::class,'store'])->middleware('auth');
    Route::get('/edit/{id}',[ContactoController::class,'update'])->middleware('auth');
    Route::get('/delete/{id}',[ContactoController::class,'destroy'])->middleware('auth');
    Route::get('/rest/{id}',[ContactoController::class,'retaurar'])->middleware('auth');
    Route::get('/eliminar/{id}',[ContactoController::class,'eliminar'])->middleware('auth');
});