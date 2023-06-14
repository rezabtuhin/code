<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class Problem extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'user_id',
        'uuid',
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

    public $sortable = ['difficulty'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}