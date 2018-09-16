<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Establecmeos l realcion entre el modelo cart y el modelo details mediante el metodo details
    public function details()
    {
    	// Como un crrito tendra muchos detalles decimos
    	return $this->hasMany(CartDetail::class);
    }
    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach ($this->details as $detail) {
    		$total += $detail->quantity * $detail->product->price;
    	}
    	return $total;
    }
    
}
