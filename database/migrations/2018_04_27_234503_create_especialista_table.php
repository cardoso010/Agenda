<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialista', function (Blueprint $table) {
            $table->increments('id');
            $table->string('perfil');
            $table->string('cargo_espec');
            $table->integer('crm_mat');
            $table->integer('user_id')->unsigned()->nullable();;
            $table->timestamps();
        });

        Schema::table('especialista', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialista');
    }
}
