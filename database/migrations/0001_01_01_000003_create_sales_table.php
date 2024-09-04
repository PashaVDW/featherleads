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
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('yes_amount')->default(0);
            $table->integer('no_amount')->default(0);
            $table->integer('calls_amount')->default(0);
            $table->integer('follow_through_amount')->default(0);
            $table->integer('target_amount')->default(0);
            $table->decimal('cost_per_customer')->default(0);
            $table->decimal('sold')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
