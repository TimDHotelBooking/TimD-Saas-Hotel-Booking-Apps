<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('total_amount')->nullable()->change();
            $table->integer("no_of_guests")->after("total_amount");
            $table->integer("no_of_rooms")->after("no_of_guests");
            $table->text("special_requests")->after("no_of_rooms")->nullable();
            $table->text("payment_method")->after("special_requests")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
