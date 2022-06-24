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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('sizes')->insert(
            array(
                [
                    'name' => 'XS',
                ],
                [
                    'name' => 'S',
                ],
                [
                    'name' => 'M',
                ],
                [
                    'name' => 'L',
                ],
                [
                    'name' => 'XL',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
};
