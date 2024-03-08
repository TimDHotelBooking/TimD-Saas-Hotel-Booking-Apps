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
        Schema::create('type_amenities', function (Blueprint $table) {
            $table->id('type_amenity_id');
            $table->unsignedBigInteger("type_id");
             $table->foreign("type_id")->on("types")->references("type_id");
             $table->unsignedBigInteger("amenity_id");
            $table->foreign("amenity_id")->on("amenities")->references("amenity_id");
            $table->unsignedBigInteger("created_by")->nullable();
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->boolean("status")->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('type_amenities', function (Blueprint $table) {
            //
        });
    }
};
