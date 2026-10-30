<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tugas extends Model
{
    public const STATUS_MENUNGGU = 'menunggu';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_REJECTED = 'rejected';

    public const CREATED_AT = 'tanggal_submit';

    public const UPDATED_AT = null;

    protected $table = 'tugas';

    protected $fillable = [
        'nama_pendamping',
        'email_pendamping',
        'nomor_hp',
        'nama_perusahaan',
        'bidang_usaha',
        'jenis_tugas',
        'deskripsi_tugas',
        'kendala',
        'catatan_tambahan',
        'status',
        'user_id',
        'dokumen_nib',
        'dokumen_sjph',
        'screenshot_oss',
        'screenshot_sihalal',
        'laporan_tugas',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_submit' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lampiran(): array
    {
        $kolom = ['dokumen_nib', 'dokumen_sjph', 'screenshot_oss', 'screenshot_sihalal', 'laporan_tugas'];

        return collect($kolom)
            ->mapWithKeys(fn ($k) => [$k => $this->{$k}])
            ->filter()
            ->all();
    }
}
