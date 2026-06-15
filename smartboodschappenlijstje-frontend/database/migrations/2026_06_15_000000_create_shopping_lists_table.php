<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('shopping_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->text('image_url')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('highest_price', 10, 2)->nullable();
            $table->unsignedBigInteger('supermarket_id')->nullable();
            $table->string('supermarket_name')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->unique(['shopping_list_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shopping_list_items');
        Schema::dropIfExists('shopping_lists');
    }
};
