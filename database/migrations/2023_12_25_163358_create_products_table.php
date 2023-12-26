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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image', 300)->nullable();
            $table->integer('price');
            $table->string('stock_quantity');
            $table->string('short_descripton')->nullable();
            $table->string('release_data');
            
            // Relation Category
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            // Relation Sub_category            
            // Relation Brand            
            $table->foreignId('brand_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            
            $table->foreignId('subcategory_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
     


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
