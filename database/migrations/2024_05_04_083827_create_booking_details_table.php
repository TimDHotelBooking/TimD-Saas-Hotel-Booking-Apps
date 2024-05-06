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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->references('booking_id')->on('bookings');
            $table->foreignId('property_id')->nullable()->references('property_id')->on('property');
            $table->foreignId('room_list_id')->nullable()->references('room_list_id')->on('room_lists');
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->foreignId('room_type_id')->nullable()->references('type_id')->on('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
