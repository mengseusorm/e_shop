<?php

use App\Enums\productStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('product_code')->max(512);
            $table->string('name')->max(512);
            $table->string('slug')->max(512);
            $table->foreignId('merchant_id')->constrained('merchants')->cascadeOnDelete();
            $table->decimal('price');
            $table->enum('status',[App\Enums\productStatus::AVAILABLE,App\Enums\productStatus::OUTOFSTOCK,App\Enums\productStatus::DISCONTINUED])->default(App\Enums\productStatus::AVAILABLE);
            $table->json('size')->nullable();
            $table->string('description')->nullable()->max(2048);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('country_code_id')->constrained('countrie_codes')->after('product_code'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
