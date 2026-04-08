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
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->onDelete('restrict');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0); 
            $table->decimal('old_price', 10, 2)->default(0); 
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();
            $table->integer('stars')->default(0);
            $table->integer('view')->default(0);
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->boolean('hit')->default(false);
            $table->boolean('new')->default(false);
            $table->boolean('sale')->default(false);
            $table->timestamps();
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
