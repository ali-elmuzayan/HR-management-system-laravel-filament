<?php

namespace App\Models;

use App\Enums\AttendanceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'date',
        'check_in',
        'check_out',
        'status',
        'notes',
        'user_id',
    ];


    protected function casts(): array
    {
        return [
            'date' => 'date',
            'check_in' => 'time',
            'check_out' => 'time',
            'status' => AttendanceStatus::class,
        ];
    }

    // ---------------------- Relationships ----------------------
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
