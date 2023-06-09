<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'difficulty',
        'description',
        'memory_limit',
        'time_limit',
        'tags',
        'sample_test_count',
        'test_cases',
    ];

    protected $casts = [
        'test_cases' => 'json',
    ];
}
