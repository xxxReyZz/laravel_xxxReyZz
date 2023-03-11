<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/rs');
});

Route::get('/rs', [RumahSakitController::class, 'index']);
Route::get('/rs/create', [RumahSakitController::class, 'create']);
Route::get('/rs/{id}/edit', [RumahSakitController::class, 'edit']);
Route::post('/rs/store', [RumahSakitController::class, 'store']);
Route::get('/rs/{id}/destroy', [RumahSakitController::class, 'destroy']);
Route::post('/rs/{id}/update', [RumahSakitController::class, 'update']);

Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/pasien/create', [PasienController::class, 'create']);
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit']);
Route::post('/pasien/store', [PasienController::class, 'store']);
Route::get('/pasien/{id}/destroy', [PasienController::class, 'destroy']);
Route::post('/pasien/{id}/update', [PasienController::class, 'update']);
Route::get('/pasien/filter_rs/{id_rs}', [PasienController::class, 'filter_rs']);
