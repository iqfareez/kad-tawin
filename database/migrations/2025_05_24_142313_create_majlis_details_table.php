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
        Schema::create('majlis_details', function (Blueprint $table) {
            $table->id();

            // Bride & groom Information
            $table->string('pengantin_lelaki_full_name');
            $table->string('pengantin_perempuan_full_name');
            $table->string('pengantin_lelaki_display_name', 50);
            $table->string('pengantin_perempuan_display_name', 50);
            $table->boolean('pengantin_lelaki_first')->default(true); // Which name comes first

            // Parents Information
            $table->string('bapa_name');
            $table->string('ibu_name');

            // Event Details
            $table->date('majlis_date');
            $table->string('majlis_time');
            $table->string('majlis_date_hijri', 50); // e.g. 15 Syawal 1444H
            $table->text('venue_address_line_1');
            $table->text('venue_address_line_2')->nullable();
            $table->text('venue_google_maps_url')->nullable();

            // Others
            $table->integer('theme')->default(1);
            $table->string('slug')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majlis_details');
    }
};
