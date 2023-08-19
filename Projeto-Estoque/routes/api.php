<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/marca', [MarcaController::class, 'store']);
Route::get('/marca', [MarcaController::class, 'index']);


Route::post('/produto', [ProdutoController::class, 'store']);
Route::get('/produto', [ProdutoController::class, 'index']);

Route::post('/fornecedores', [FornecedorController::class, 'store']);
Route::get('/fornecedores', [FornecedorController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
