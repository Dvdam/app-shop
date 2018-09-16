<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');


// Campos para nuestro modelo producto
            $table->string('name');
            $table->string('description');
            $table->text('long_description')->nullable();
            $table->float('price');
// Creamos clave foranea para decir que el producot pertenece a una categoria
// Integer es tipo entero sin signo - En nuestro caso nuestros productos pueden ser de una categoria - Y tambien no puede pertenecer a ninguna categria
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');


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
        Schema::dropIfExists('products');
    }
}
