<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"])->name("dashboard");

    /*Route::prefix('dashboard.')->name("dashboard")->group(function () {
        Route::get('/', [\App\Http\Controllers\DashboardController::class,"index"]);
    });*/
    Route::resource("dashboard", \App\Http\Controllers\DashboardController::class)->except("index");
    Route::resource("roles", \App\Http\Controllers\RolesController::class);
    Route::resource("permissions", \App\Http\Controllers\PermissionController::class);
    Route::resource("users", \App\Http\Controllers\UsersController::class);
    Route::resource("property", \App\Http\Controllers\PropertyController::class);
    Route::resource("rooms", \App\Http\Controllers\RoomsController::class);
    Route::resource("tariff", \App\Http\Controllers\TariffController::class);
    Route::resource("customers", \App\Http\Controllers\CustomersController::class);
    Route::resource("agents", \App\Http\Controllers\AgentsController::class);
    Route::resource("bookings", \App\Http\Controllers\BookingsController::class);
    Route::resource("payments", \App\Http\Controllers\PaymentsController::class);
    Route::resource("notifications", \App\Http\Controllers\NotificationController::class);

});

//Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
