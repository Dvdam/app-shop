<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{
    //Realizamos un construcotr para hacer uso del middleware al usar el carrito de compras
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function store(Request $request)
    {

    	$messages =[
    	    'quantity.required' => 'Es Obligatorio definir una cantidad para el producto',
    		'quantity.numeric' => 'Ingrese una cantidad válida',
    		'quantity.min' => 'No se admiten valores negativos'
    	];
    	//Las reglas que queremos validar son un areglo asociativo (array asociativo)
    	$rules = [
    		'quantity' => 'required|numeric|min:0'

        ];

        $this->validate($request, $rules, $messages);


    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
        // $cartDetail->quantity = $request->quantity;
        $cartDetail->quantity = $request->input('quantity');
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
    	if ($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();
    	// Para mostrar Notificaciones al usuario al momento de realizar las consultas hacemos lo siguiente
    	$notification =  'El producto se ha eliminado del carrito de compras correctamente';
    	return back()->with(compact('notification'));
    	// return back();
    }

}
