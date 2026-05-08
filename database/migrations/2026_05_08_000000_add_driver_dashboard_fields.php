<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add columns to existing buses table
        Schema::table('buses', function (Blueprint $table) {
            if (!Schema::hasColumn('buses', 'seat_status')) {
                $table->enum('seat_status', ['sit', 'stand'])->default('sit');
            }
            if (!Schema::hasColumn('buses', 'payment_method')) {
                $table->enum('payment_method', ['COD', 'Bkash'])->default('COD');
            }
        });

        // Create fuel_logs table
        Schema::create('fuel_logs', function (Blueprint $table) {
            $table->id();
            $table->string('bus_id'); // Using string to match their buses.id
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->decimal('amount_liters', 8, 2);
            $table->decimal('cost', 10, 2);
            $table->date('refuel_date');
            $table->timestamps();
        });

        // Create expense_requests table
        Schema::create('expense_requests', function (Blueprint $table) {
            $table->id();
            $table->string('bus_id'); // Using string to match their buses.id
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->string('item_name');
            $table->text('description');
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expense_requests');
        Schema::dropIfExists('fuel_logs');
        Schema::table('buses', function (Blueprint $table) {
            $table->dropColumn(['seat_status', 'payment_method']);
        });
    }
};
