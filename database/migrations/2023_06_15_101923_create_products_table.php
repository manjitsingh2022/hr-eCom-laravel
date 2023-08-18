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
            $table->string('product_name')->nullable();
            $table->unsignedBigInteger('parent_id')->default();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->integer('status')->default(1);
            $table->longText('base64')->nullable();
            $table->integer('selected')->default(0);
            $table->timestamps();


            $table->foreign('parent_id')->references('id')->on('categories');
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
