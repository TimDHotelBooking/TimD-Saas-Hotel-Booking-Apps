<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInfoController;

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
    Route::post('/admin/change_property', [\App\Http\Controllers\DashboardController::class, "change_property"])->name("admin.change_property");

    /*Route::prefix('dashboard.')->name("dashboard")->group(function () {
        Route::get('/', [\App\Http\Controllers\DashboardController::class,"index"]);
    });*/
    Route::resource("dashboard", \App\Http\Controllers\DashboardController::class)->except("index");
    Route::resource("roles", \App\Http\Controllers\RolesController::class);
    Route::resource("permissions", \App\Http\Controllers\PermissionController::class);
    Route::resource("users", \App\Http\Controllers\UsersController::class);
    Route::resource("property", \App\Http\Controllers\PropertyController::class);

    Route::prefix('rooms')->name("rooms")->group(function () {
        Route::get('get-room-tariffs/{room_id}', [\App\Http\Controllers\RoomsController::class,"get_room_tariffs"])->name('get_room_tariffs');
    });

    Route::get('get-room-available', [\App\Http\Controllers\RoomsController::class,"get_room_available"])->name('get.room.available');
   
    Route::resource('offers', \App\Http\Controllers\OfferController::class);
    Route::resource("rooms", \App\Http\Controllers\RoomsController::class);

    Route::prefix('tariff')->name("tariff")->group(function () {
        Route::post('check-correct-tariff-date', [\App\Http\Controllers\TariffController::class,"checkCorrectTariffDate"])->name('check_correct_tariff_date');
    });
    Route::resource("tariff", \App\Http\Controllers\TariffController::class);
    Route::resource("type", \App\Http\Controllers\TypeController::class);
    Route::resource("customers", \App\Http\Controllers\CustomersController::class);
    Route::resource("property_agents", \App\Http\Controllers\PropertyAgentsController::class);

    Route::prefix('bookings')->name("bookings.")->group(function () {
        Route::post('calculate-room-booking-amount', [\App\Http\Controllers\BookingsController::class,"calculate_total_bill_amount"])->name('calculate_total_bill_amount');
    });
    Route::resource("bookings", \App\Http\Controllers\BookingsController::class);
    Route::resource("payments", \App\Http\Controllers\PaymentsController::class);
    Route::resource("notifications", \App\Http\Controllers\NotificationController::class);

    Route::get('appinfo-index', [AppInfoController::class, 'index'])->name('appinfo.index');
    Route::post('appinfo-update', [AppInfoController::class, 'update'])->name('appinfo.update');

});

//Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
