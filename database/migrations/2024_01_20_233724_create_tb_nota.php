<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbNota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_notas', function (Blueprint $table) {
            $table->Increments('id_notas');
            $table->string('nome_cliente', 255);
            $table->string('tipo_servico', 255);
            $table->date('data_nota');
            $table->double('preco_nota', 10, 2);
            $table->integer('id_pagamento')->unsigned();
            $table->foreign('id_pagamento')->references('id_pagamento')->on('tb_pagamento')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id_status')->on('tb_status_nota')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tb_notas');
    }
}
