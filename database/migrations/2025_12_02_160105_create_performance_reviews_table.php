<?php

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
        Schema::create('performance_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_period');
            $table->integer('quality_of_work')->comment('1-10 scale')->nullable(); 
            $table->integer('productivity')->comment('1-10 scale')->nullable();
            $table->integer('communication')->comment('1-10 scale')->nullable();
            $table->integer('teamwork')->comment('1-10 scale')->nullable();
            $table->integer('leadership')->comment('1-10 scale')->nullable();
            $table->decimal('overall_rating', 3, 2)->nullable();
            $table->text('strengths')->nullable();
            $table->text('areas_for_improvement')->nullable();
            $table->text('goals')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();

            // Relationships: 
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'reviewer_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_reviews');
    }
};
