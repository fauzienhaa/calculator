<?php

use App\Http\Controllers\CalculationController;
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

Route::get('/', [CalculationController::class, 'index']);
Route::post('/calculate', [CalculationController::class, 'calculate']);
Route::get('/{$result}', [CalculationController::class, 'history']);