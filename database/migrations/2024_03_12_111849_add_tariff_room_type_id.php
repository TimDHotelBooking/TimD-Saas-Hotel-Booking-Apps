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
        Schema::table('tariff', function (Blueprint $table) {
            $table->unsignedBigInteger("room_type_id")->nullable()->after("price");
            $table->foreign("room_type_id")->references("type_id")->on("types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tariff', function (Blueprint $table) {
            //
        });
    }
};
