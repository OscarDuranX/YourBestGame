<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComentariMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomuser');
            $table->string('comentari');

            $table->integer('joc_id')->unsigned();
            $table->foreign('joc_id')->references('id')->on('joc');
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
        Schema::drop('comentaris');
    }
}
