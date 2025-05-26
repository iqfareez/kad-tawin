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
            $table->string('venue_waze_url')->nullable()->after('venue_google_maps_url');
            $table->boolean('config_show_rsvp')->default(true)->after('theme');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('majlis_details', function (Blueprint $table) {
            $table->dropColumn('venue_waze_url');
            $table->dropColumn('config_show_rsvp');
        });
    }
};
