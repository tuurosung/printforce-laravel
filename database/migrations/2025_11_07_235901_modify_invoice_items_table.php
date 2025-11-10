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
        Schema::table('invoice_items', function (Blueprint $table) {

            $table->string('job_id')->nullable()->after('invoice_id')->change();
            $table->string('service_id')->nullable()->after('job_id');
            $table->string('service_type')->nullable()->after('service_id');
            $table->decimal('width', 10, 2)->nullable()->after('unit_cost');
            $table->decimal('height', 10, 2)->nullable()->after('width');
            $table->string('measuring_unit')->nullable()->after('height');
            $table->decimal('material_unit_cost', 10, 2)->nullable()->after('measuring_unit');
            $table->decimal('material_total_cost', 10, 2)->nullable()->after('material_unit_cost')->storedAs('material_unit_cost * qty');
            $table->integer('qty')->nullable()->after('measuring_unit')->change();
            $table->decimal('total', 10, 2)->nullable()->after('material_total_cost')->storedAs('(unit_cost * qty) + material_total_cost')->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn([
                'job_id',
                'service_id',
                'service_type',
                'width',
                'height',
                'measuring_unit',
                'material_unit_cost',
                'material_total_cost',
                'total'
            ]);
        });
    }
};
