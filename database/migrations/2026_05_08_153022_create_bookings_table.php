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

            $table->id();

            $table->string('user_id');
            $table->string('bus_id');

            // seat info
            $table->integer('seat_serial');

            // subsidy info
            $table->boolean('has_subsidy')->default(false);

            // payment
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('unpaid');

            // booking status
            $table->string('status')->default('booked');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('bus_id')
                ->references('id')
                ->on('buses')
                ->onDelete('cascade');
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
