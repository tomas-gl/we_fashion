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
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', $precision = 8, $scale = 2)->nullable();
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL'])->nullable();
            $table->string('picture', 100)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('state')->nullable();
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
