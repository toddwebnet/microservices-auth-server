<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasswordLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwordLog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid');
            $table->string('password', 128);
            $table->timestamp('created_at')->nullable();

            $table->foreign('pid')->references('pid')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passwordLog');
    }
}
