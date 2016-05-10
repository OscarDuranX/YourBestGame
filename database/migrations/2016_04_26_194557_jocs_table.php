<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jocs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('imatge');
            $table->string('URL')->unique();
            $table->string('categoria');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');

            $table->rememberToken();
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
        Schema::drop('jocs');
    }
}
