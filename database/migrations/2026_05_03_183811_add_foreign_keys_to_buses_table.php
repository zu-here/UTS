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
            $table->foreign('route_id')
              ->references('id')
              ->on('routes')
              ->onDelete('cascade');

            $table->foreign('ds_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses', function (Blueprint $table) {
            //
            $table->dropForeign(['route_id']);
            $table->dropForeign(['ds_id']);
        });
    }
};
