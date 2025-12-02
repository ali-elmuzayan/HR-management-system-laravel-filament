<?php

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('employee_id')->unique()->after('id'); 
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('hire_date')->nullable();
            $table->enum('employee_type', ['full_time', 'part_time', 'contractor', 'intern'])->default('full_time');
            $table->enum('status', ['active', 'inactive', 'on_leave', 'terminated'])->default('active');
            $table->decimal('salary', 10, 2)->nullable();
            $table->text('address')->nullable(); 
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();

            // Relationships: 
            $table->foreignIdFor(Department::class)->nullable()->constrained()->onDelete('set null');
            $table->foreignIdFor(Position::class)->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['position_id']);
            $table->dropColumn([
                'employee_id',
                'phone',
                'date_of_birth',
                'hire_date',
                'employee_type',
                'employment_status',
                'salary',
                'address',
                'emergency_contact_name',
                'emergency_contact_phone',
                'department_id',
                'position_id',
            ]);
        });
    }
};
