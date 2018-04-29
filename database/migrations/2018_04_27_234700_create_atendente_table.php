<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('perfil');
            $table->string('cargo');
            $table->integer('matricula');
            $table->integer('setor');
            $table->string('local');
            $table->integer('user_id')->unsigned()->nullable();;
            $table->timestamps();
        });

        Schema::table('atendente', function(Blueprint $table){
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
        Schema::dropIfExists('atendente');
    }
}
