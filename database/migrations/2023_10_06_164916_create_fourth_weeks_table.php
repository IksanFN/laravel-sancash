<?php

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
        Schema::create('fourth_weeks', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('month_id')->constrained()->cascadeOnDelete();
            $table->string('bill_code')->unique();
            $table->string('student_nisn');
            $table->string('student_name');
            $table->string('student_major');
            $table->string('student_group');
            $table->string('student_phone');
            $table->string('bill_month');
            $table->string('bill_year');
            $table->unsignedBigInteger('bill');
            $table->date('start_of_week');
            $table->date('end_of_week');
            $table->boolean('is_paid')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourth_weeks');
    }
};
