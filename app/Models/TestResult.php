<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestResult extends Model
{
    protected $table = 'test_results';

    protected $fillable = [
        'user_id',
        'pre_test_score',
        'post_test_score',
        'progress',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
