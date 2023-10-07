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
            $table->string('trx_code')->unique();
            $table->string('bill_code')->unique();
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
