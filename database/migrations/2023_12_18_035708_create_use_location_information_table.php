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
        Schema::create('user_location_information', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('device')->nullable();
            $table->string('user_type')->nullable();
            $table->string('type_of_user_id')->nullable();
            $table->enum('access_type',['login','signup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use_location_information');
    }
};
