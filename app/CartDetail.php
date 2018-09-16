<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
    // Establecemos una realcion entre el modelo cartDetail y el modelo prodcut;  para poder acceder a los datos del producto desde un detalle. USando el sigueitne metodo
    // 
    public function product()
    {
    	// Un detalla pertenece a un carrito de compras
    	return $this->belongsTo(Product::class);
    }
}
