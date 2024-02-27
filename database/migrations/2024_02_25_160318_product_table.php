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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->foreign('category_id')->references('id')->on('category');
            $table->unsignedBigInteger('sub_category_id')->default(0);
            $table->foreign('sub_category_id')->references('id')->on('sub_category');
            $table->string('brand_id')->nullable()->default(0);
            $table->string('old_price')->nullable();
            $table->string('price')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('shipping_returns')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('archive')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('product');
    }
};
