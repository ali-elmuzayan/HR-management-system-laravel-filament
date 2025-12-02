<?php

namespace App\Models;

use App\Enums\LeaveRequestStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequest extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'days', 
        'reason', 
        'state', 
        'rejection_reason', 
        'approved_at', 
        'leave_type_id',
        'user_id',
        'approved_by',

    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'approved_at' => 'datetime',
            'days' => 'integer',
            'state' => LeaveRequestStatus::class,
        ];
    }


    // ------------------ Relationships ------------------
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
