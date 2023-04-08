<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['exit_intent','slide_in','fullscreen']);
            $table->string('page_url');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('positionTop')->nullable();
            $table->string('positionLeft')->nullable();
            $table->string('positionButton')->nullable();
            $table->string('positionRight')->nullable();
            $table->integer('delay')->nullable()->default(0);
            $table->string('background_color')->nullable()->default('red');
            $table->string('text_color')->nullable()->default('black');;
            $table->string('font_size')->nullable();
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
        Schema::dropIfExists('popups');
    }
}
