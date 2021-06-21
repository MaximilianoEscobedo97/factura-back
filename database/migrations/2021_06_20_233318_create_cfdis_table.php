<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfdis', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->string('TipoDocumento');
            $table->string('UsoCFDI');
            $table->integer('Serie');
            $table->string('FormaPago');
            $table->string('MetodoPago');
            $table->string('CondicionesDePago')->nullable();
            $table->string('Moneda');
            $table->string('TipoCambio')->nullable();
            $table->integer('NumOrder')->nullable();
            $table->string('Fecha')->nullable();
            $table->string('Comentarios')->nullable();
            $table->string('Cuenta')->nullable();
            $table->boolean('EnviarCorreo')->nullable();
            $table->string('LugarExpedicion')->nullable();
            $table->enum('status',['enviada','Cancelada']);


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfdis');
    }
}
