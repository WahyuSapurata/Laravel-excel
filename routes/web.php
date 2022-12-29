<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [SiswaController::class, 'index']);
Route::post('/siswa/import', [SiswaController::class, 'import_excel']);
Route::delete('/siswa/delete', [SiswaController::class, 'delete']);
