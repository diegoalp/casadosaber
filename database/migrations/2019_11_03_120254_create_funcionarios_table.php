<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('foto');
            $table->date('data_nasc');
            $table->string('sexo');
            $table->string('tipo_sanguineo');
            $table->string('cpf', 14)->unique();
            $table->string('rg');
            $table->string('naturalidade');
            $table->string('escolaridade');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('celular');
            $table->date('data_admissao');
            $table->float('salario');
            $table->string('cargo');
            $table->integer('estagio');
            $table->softDeletes();
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
        Schema::dropIfExists('funcionarios');
    }
}
