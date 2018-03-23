<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('division');
            $table->string('document'); 
            $table->string('year_release');
            $table->string('item_code');
            $table->string('file');
            $table->integer('user_id');
            $table->string('sharetoken');
            $table->string('privacy');
            $table->string('document_owner');
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
        Schema::dropIfExists('cruds');
    }
}
