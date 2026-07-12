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
        Schema::create('printforce_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_id');
            $table->string('job_type');
            $table->string('jobable_id');
            $table->string('jobable_type');
            $table->string('customer_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('job_status')->default('pending');
            $table->date('date')->nullable();
            $table->text('notes')->nullable();
            $table->string('assigned_to')->nullable();
            $table->timestamps();

            $table->index(['jobable_id', 'jobable_type']);
            $table->index(['subscriber_id', 'created_at']);
            $table->index('job_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printforce_jobs');
    }
};
