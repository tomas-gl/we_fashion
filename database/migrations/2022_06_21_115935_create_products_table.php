<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', $precision = 8, $scale = 2)->nullable();
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL'])->nullable();
            $table->string('picture_name', 255)->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('discount')->nullable();
            $table->string('reference', 16)->nullable();
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
};
