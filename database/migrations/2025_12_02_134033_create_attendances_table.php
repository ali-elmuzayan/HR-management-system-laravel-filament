<?php

use App\Models\Attendance;
use App\Models\User;
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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date'); 
            $table->time('check_in')->nullable(); 
            $table->time('check_out')->nullable(); 
            $table->enum('status',['present', 'absent', 'late', 'half_day', 'remote_work'])->default('present'); 
            $table->text('notes')->nullable(); 
            $table->timestamps();

            // Relationships
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); 

            // Unique constraint
            $table->unique(['user_id','date']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
