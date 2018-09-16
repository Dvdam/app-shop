<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //Definimos el metodo update para reallizar los pedidos

	public function update()
	{
		$cart = auth()->user()->cart;
		$cart->status = 'Pending';
		$cart->save(); //Update

    	$notification =  'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía Email.';
    	return back()->with(compact('notification'));
	}
    
}
