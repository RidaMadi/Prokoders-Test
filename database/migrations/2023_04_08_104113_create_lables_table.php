<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('popup_id')->index();
            $table->string('text')->nullable();
            $table->string('color')->nullable();
            $table->string('font_size')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
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
        Schema::dropIfExists('lables');
    }
}
