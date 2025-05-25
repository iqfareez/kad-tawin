<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('majlis_details', function (Blueprint $table) {
            $table->time('majlis_start_time')->nullable()->after('majlis_time');
            $table->time('majlis_end_time')->nullable()->after('majlis_start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('majlis_details', function (Blueprint $table) {
            $table->dropColumn(['majlis_start_time', 'majlis_end_time']);
        });
    }
};
