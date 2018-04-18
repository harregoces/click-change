<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('original_link');
            $table->string('redirect_link');
            $table->timestamps();

            //foreing key
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            //unique key
            $table->unique('user_id', 'original_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop the table
        Schema::drop('links');
    }
}
