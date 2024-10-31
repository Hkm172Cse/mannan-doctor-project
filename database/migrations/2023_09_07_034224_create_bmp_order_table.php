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
        Schema::create('bmp_order', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('suburb')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('company')->nullable();
            $table->string('broker_title')->nullable();
            $table->longText('broker_address')->nullable();
            $table->string('broker_email')->nullable();
            $table->string('qoute_session_id')->nullable();
            $table->string('card_name')->nullable();
            $table->string('cc_number')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('cvn')->nullable();
            $table->decimal('delivery_fee')->nullable();
            $table->enum('status',['pending','sent','accept','reject'])->default('pending');
            $table->date('quoted_at')->nullable();
            $table->decimal('brokerage_fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmp_order');
    }
};
