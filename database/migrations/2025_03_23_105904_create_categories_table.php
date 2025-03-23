<?php

use App\Enums\status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('category_name');
            $table->string('category_slug');
            $table->enum('status',[App\Enums\status::ACTIVE,App\Enums\status::INACTIVE])->default(App\Enums\status::ACTIVE); 
            $table->string('description')->nullable()->max(2048);
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
        Schema::dropIfExists('categories');
    }
}
