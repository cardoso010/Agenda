<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resumo',400);
            $table->string('descricao', 255);
            $table->boolean('status');
            $table->dateTime('data_solucao');
            $table->dateTime('data_fechamento');
            $table->string('acao', 500);
            $table->integer('paciente_id')->unsigned()->nullable();
            $table->integer('setor_id')->unsigned()->nullable();
            $table->integer('especialista_id')->unsigned()->nullable();
            $table->string('tipo_chamado');
            $table->integer('servico_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('atendimento', function(Blueprint $table){
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');
            $table->foreign('setor_id')->references('id')->on('setor')->onDelete('cascade');
            $table->foreign('especialista_id')->references('id')->on('especialista')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimento');
    }
}
