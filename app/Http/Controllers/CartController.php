<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

// use App\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //Definimos el metodo update para reallizar los pedidos
	public function update()
	{
		$client = auth()->user();
		$cart = $client->cart;
		$cart->status = 'Pending';
		$cart->order_date = Carbon::now();
		$cart->save(); //Update

		$admins = User::where('admin', true)->get();
		Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notification =  'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía Email.';
    	return back()->with(compact('notification'));
    }


}
