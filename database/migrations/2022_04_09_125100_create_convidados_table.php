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
        Schema::create('convidados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->boolean('patrocinador')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('festa_convidado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festa_id')->constrained('festas');
            $table->foreignId('convidado_id')->constrained('convidados');
            $table->foreignId('status_id')->default(1)->constrained('convidados_status');
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
        Schema::dropIfExists('festa_convidado');
        Schema::dropIfExists('convidados');
    }
};
