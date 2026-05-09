<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_details_id');
            $table->foreignId('order_id')->constrained('orders', 'order_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
