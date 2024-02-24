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
        Schema::create('property_agents', function (Blueprint $table) {
            $table->id('property_agent_id');
            $table->unsignedBigInteger('agent_id');
            $table->foreign("agent_id")->on("users")->references("user_id");
            $table->unsignedBigInteger('property_id');
            $table->foreign("property_id")->on("property")->references("property_id");
            $table->unsignedBigInteger('created_by');
            $table->foreign("created_by")->on("users")->references("user_id");
            $table->unsignedBigInteger('updated_by');
            $table->foreign("updated_by")->on("users")->references("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_agents');
    }
};
