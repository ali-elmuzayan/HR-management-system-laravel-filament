<?php

namespace App\Models;

use App\Enums\PayrollStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected $fillable = [
        'month', 
        'year', 
        'basic_salary', 
        'allowances', 
        'deductions', 
        'bonus', 
        'net_salary', 
        'status', 
        'paid_at',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'basic_salary' => 'decimal:2',
            'allowances' => 'decimal:2',
            'deductions' => 'decimal:2',
            'bonus' => 'decimal:2',
            'net_salary' => 'decimal:2',
            'paid_at' => 'datetime',
            'status' => PayrollStatus::class,
        ];
    }

    // ------------------ Relationships ------------------
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
