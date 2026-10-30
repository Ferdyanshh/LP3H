<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal',
        'waktu',
        'kegiatan',
        'pic_narasumber',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date:Y-m-d',
        ];
    }
}
