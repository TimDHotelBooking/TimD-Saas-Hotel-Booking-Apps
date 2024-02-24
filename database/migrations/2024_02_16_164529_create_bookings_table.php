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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")->on("customers")->references("customer_id");
            $table->unsignedBigInteger("room_id");
            $table->foreign("room_id")->on("rooms")->references("room_id");
            $table->unsignedBigInteger("agent_id");
            $table->foreign("agent_id")->on("users")->references("user_id");
            $table->date("check_in_date");
            $table->date("check_out_date");
            $table->text("total_amount");
            $table->unsignedBigInteger("created_by")->nullable();
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->boolean("status")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
