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
        Schema::table('buses', function (Blueprint $table) {
            //

            // Change driver_id type to match users.id (string)
            $table->string('ds_id', 20)->nullable()->change();

            // Add route_id (string FK)
            $table->string('route_id', 20)->after('id');

            // Add departure time
            $table->time('departure_time')->nullable();

            // Remove old route_name
            $table->dropColumn('route_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses', function (Blueprint $table) {
            //
            $table->dropColumn(['route_id', 'departure_time']);

            $table->string('route_name');
        });
    }
};
