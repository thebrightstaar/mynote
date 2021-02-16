<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable($value = false);
            $table->string('title');
            $table->longText('content');
            $table->integer('prioity')->nullable($value = true) ;
            $table->string('photo')->nullable($value = true);
            $table->softDeletes();
            $table->timestamps();     
            $table->foreign('user_id')->references('id')->on('users');
              });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
