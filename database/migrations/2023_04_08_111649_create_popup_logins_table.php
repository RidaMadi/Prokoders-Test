<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_logins', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('popup_id')->index();
            $table->BigInteger('user_id')->index();
            $table->boolean('clicked');
            $table->string('device_type')->nullable();
            $table->string('page_url')->nullable();
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
        Schema::dropIfExists('popup_logins');
    }
}
