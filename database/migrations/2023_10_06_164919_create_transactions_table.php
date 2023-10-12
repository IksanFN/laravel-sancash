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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('first_week_id')->nullable();
            $table->foreignId('second_week_id')->nullable();
            $table->foreignId('third_week_id')->nullable();
            $table->foreignId('fourth_week_id')->nullable();
            $table->string('trx_code')->unique();
            $table->string('student_nisn');
            $table->string('student_name');
            $table->string('student_major');
            $table->string('student_group');
            $table->string('student_phone');
            $table->string('bill_year');
            $table->string('bill_month');
            $table->enum('status', ['1', '2']);
            $table->timestamp('paid_date');
            $table->unsignedBigInteger('bill');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('first_week_id')->references('id')->on('first_weeks');
            $table->foreign('second_week_id')->references('id')->on('second_weeks');
            $table->foreign('third_week_id')->references('id')->on('third_weeks');
            $table->foreign('fourth_week_id')->references('id')->on('fourth_weeks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
