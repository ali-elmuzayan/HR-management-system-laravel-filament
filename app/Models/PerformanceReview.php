<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceReview extends Model
{
    
    protected $fillable = [
        'review_period',
        'quality_of_work',
        'productivity',
        'communication',
        'teamwork',
        'leadership',
        'overall_rating',
        'strengths',
        'areas_for_improvement',
        'goals',
        'comments',
        'user_id',
        'reviewer_id',
    ];

    protected function casts(): array
    {
        return [
            'overall_rating' => 'decimal:2',
        ];
    }


    
    // ---------------------- Relationships ----------------------
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer() :BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
