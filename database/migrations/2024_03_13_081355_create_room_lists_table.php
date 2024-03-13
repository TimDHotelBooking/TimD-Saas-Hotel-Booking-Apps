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
        Schema::create('room_lists', function (Blueprint $table) {
            $table->id('room_list_id');
            $table->unsignedBigInteger("property_id");
            $table->foreign("property_id")->on("property")->references("property_id");

            $table->unsignedBigInteger("room_type_id");
            $table->foreign("room_type_id")->on("types")->references("type_id");

            $table->unsignedBigInteger("room_id");
            $table->foreign("room_id")->on("rooms")->references("room_id");         
           
            $table->text("room_number")->nullable();
            $table->text("floor")->nullable();

           $table->enum("availability_status",['Available','Booked','Occupied','Maintenance','Cleaning'])->default('Available');

           
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
        Schema::dropIfExists('room_lists');
    }
};
