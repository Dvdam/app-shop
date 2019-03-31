<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Cart;
use App\CartDetail;

class UsersOrders extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $user;
    public $cart;

    // public function __construct(User $user, Cart $cart)
    // {
    //     //
    //     $this->middleware('auth');
    //     $this->user = $user;
    //     $this->cart = $cart;
    // }

// Mostramos Los Pedidos Realizados
    public function index()
    {
        $user = auth()->user()->id;
        $orders = Cart::where('status', '!=','active')->where('user_id', '=', $user)->orderBy('order_date', 'DESC')->get();
        return view('dashboard')->with(compact('orders'));

    }

    // Mostramos el Pedido con su detalle
    public function show(Request $request, $id)
    {
        $user = auth()->user()->id;
        $orders = Cart::findOrFail($id);

        // dd($orders->user_id );
      	if ($orders->user_id == $user){
            return view('order')->with(compact('orders'));
          }
        $notification =  'El carrito de Compras no Existe';
        return back()->with(compact('notification'));
        // return back();

    }

}
