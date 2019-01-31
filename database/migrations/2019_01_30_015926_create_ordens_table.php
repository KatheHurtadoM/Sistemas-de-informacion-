<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user_cliente');
            $table->unsignedInteger('id_user_encargado');
            $table->double('total');
            $table->double('descuento');
            $table->string('nombre_factura');
            $table->string('forma_pago');
            $table->string(' nit');
            $table->string('moneda');
            $table->date('fecha_entrega');
            $table->unsignedInteger('id_estado');
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
        Schema::dropIfExists('ordenes');
    }
}
