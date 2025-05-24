<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MajlisDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengantin_lelaki_full_name',
        'pengantin_perempuan_full_name',
        'pengantin_lelaki_display_name',
        'pengantin_perempuan_display_name',
        'pengantin_lelaki_first',
        'bapa_name',
        'ibu_name',
        'majlis_date',
        'majlis_time',
        'majlis_date_hijri',
        'venue_address_line_1',
        'venue_address_line_2',
        'venue_google_maps_url',
        'theme',
        'slug',
    ];

    protected $casts = [
        'majlis_date' => 'date',
        'pengantin_lelaki_first' => 'boolean',
    ];
}
