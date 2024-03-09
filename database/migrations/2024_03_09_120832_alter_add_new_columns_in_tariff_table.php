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
            $table->text("holiday_price")->after("price")->nullable();
            $table->text("promotional_price")->after("holiday_price")->nullable();
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
