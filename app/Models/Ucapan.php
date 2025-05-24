<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    protected $fillable = [
        'nama',
        'ucapan',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
