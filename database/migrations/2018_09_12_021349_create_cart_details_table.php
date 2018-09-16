<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->increments('id');
            // Mis campos
            // Clave Foranea FK
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');

            // Clave Foranea FK
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');  


            $table->integer('quantity');
            // Definimos el valor por default en cero 0
            $table->integer('discount')->default(0);  // Sera un %





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
        Schema::dropIfExists('cart_details');
    }
}
