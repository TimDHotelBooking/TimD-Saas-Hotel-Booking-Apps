<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PropertyController;
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

Route::get('/property', [PropertyController::class,'property']);
Route::post('/type',[PropertyController::class,'type']);
Route::post('/room',[PropertyController::class,'room']);
Route::post('/avlroom',[PropertyController::class,'avlroom']);
Route::post('/customer/store',[CustomerController::class, 'store']);
Route::post('/booking',[PropertyController::class, 'booking']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
