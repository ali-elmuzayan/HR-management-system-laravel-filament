<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\EmployeeType;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', 
        'date_of_birth', 
        'hire_date', 
        'employee_type',
        'status', 
        'salary', 
        'address', 
        'emergency_contact_name',
        'emergency_contact_phone',
        'department_id',
        'position_id',
        'employee_id',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'salary' => 'decimal:2',
            'employee_type' => EmployeeType::class,
            'status' => UserStatus::class,
        ];
    }


    // -----------------  Relationships   --------------------
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function performanceReviews(): HasMany
    {
        return $this->hasMany(PerformanceReview::class);
    }



    // -----------------  Model Events   --------------------
    protected static function boot() 
    {
        parent::boot();

        static::creating(function ($employee) {
            if (empty($employee->employee_id)) {
                $lastEmployee = static::orderBy('id', 'desc')->first(); 

                $nextNumber = 1; 

                if ($lastEmployee && $lastEmployee->employee_id) {
                    if (preg_match('/EMP-(\d+)$/', $lastEmployee->employee_id, $matches)) {
                        $nextNumber = (int)$matches[1] + 1;
                    }
                }
                
                $employee->employee_id = 'EMP-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}
