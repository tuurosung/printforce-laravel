<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UpdateDatabaseStructure extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add notes column to invoice items table
        Schema::table("invoice_items", function (Blueprint $table) {

            if (!Schema::hasColumn("invoice_items","notes")) {
                $table->text("notes")->nullable();
            } else {
                $table->text("notes")->after("qty")->nullable()->change();
            }
        });
    }
}
