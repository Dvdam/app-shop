<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{
    //
    // public function store(Request $request)
    // {
    // 	$cartDetail = new CartDetail();
    // 	$cartDetail->cart_id = auth()->user()->cart_id;
    // 	$cartDetail->product_id = $request->product_id;
    // 	$cartDetail->quantity = $request->quantity;
    // 	$cartDetail->save();

    // 	return back();
    // }
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	// return back();
        $notification =  'El producto se ha cargado a tu carrito de compras Exitosamente'; 
        return back()->with(compact('notification')); 
    }

  // Metodo para eliminar el carrito 
      public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	// Para evitar vulnerabilidades en el carrito hacemos lo sguiente -> (pertenece)
    	if ($cartDetail->cart_id == auth()->user()->cart_id)
    		$cartDetail->delete();

    	
    	// Para mostrar Notificaciones al usuario al momento de realizar las consultas hacemos lo siguiente
    	$notification =  'El producto se ha eliminado del carrito de compras correctamente';
    	return back()->with(compact('notification'));
    	// return back();
    }

}
