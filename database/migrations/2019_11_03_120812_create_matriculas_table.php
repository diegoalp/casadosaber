<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->integer('ano_id')->unsigned();
            $table->foreign('ano_id')->references('id')->on('ano_letivo');
            $table->float('mensalidade');
            $table->integer('educaMais');
            $table->integer('bolsista');
            $table->string('dia_vencimento');
            $table->date('data_matricula');
            $table->integer('status');
            $table->unique(['aluno_id', 'ano_id']);
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
        Schema::dropIfExists('matriculas');
    }
}
