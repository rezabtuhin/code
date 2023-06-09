<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'publish'
    ];

    protected $casts = [
        'test_cases' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}