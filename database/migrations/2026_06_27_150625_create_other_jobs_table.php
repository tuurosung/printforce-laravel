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
        Schema::create('jobs_other', function (Blueprint $table) {
            $table->id('sn');
            $table->string('subscriber_id');
            $table->string('customer_id');
            $table->string('job_id');
            $table->string('service_id');
            $table->double('cost')->default(0);
            $table->integer('qty')->default(0);
            $table->double('total')->default(0);
            $table->string('job_assigned_by');
            $table->timestamp('job_assigned_at')->nullable();
            $table->timestamp('job_completed_at')->nullable();
            $table->string('job_completed_by')->nullable();
            $table->dateTime('date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_jobs');
    }
};
