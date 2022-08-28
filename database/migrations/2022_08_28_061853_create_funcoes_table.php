<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        Schema::create('funcao_permissao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcao_id')->constrained('funcoes');
            $table->foreignId('permissao_id')->constrained('permissoes');
        });

        Schema::create('funcao_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcao_id')->constrained('funcoes');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcao_user');
        Schema::dropIfExists('funcao_permissao');
        Schema::dropIfExists('funcoes');
    }
};
