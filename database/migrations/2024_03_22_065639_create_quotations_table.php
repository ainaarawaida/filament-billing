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
        Schema::dropIfExists('quotations');
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_customer_id')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->date('quotation_date')->nullable();
            $table->integer('valid_days')->nullable();
            $table->string('quote_status')->nullable();
            $table->string('title')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('taxes', 10, 2)->nullable();
            $table->decimal('percentage_tax', 5, 2)->nullable();
            $table->decimal('delivery', 10, 2)->nullable();
            $table->decimal('final_amount', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
