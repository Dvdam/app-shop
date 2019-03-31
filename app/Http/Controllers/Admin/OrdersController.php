<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Mail\UpdateUserOrder;

use App\User;
use App\Cart;
use Mail;


class OrdersController extends Controller
{

   public function index()
   {
    //   $orders = Cart::where('status', '!=','active')->orderBy('order_date', 'DESC')->get();
      $orders = Cart::where('status', '=','Pending')->orderBy('order_date', 'DESC')->get();
      $users = User::all();
      return view('admin.orders.index', compact('orders', 'users'));
   }

// Mostramos los Pedidos Confirmados
    public function confirmed()
    {
    //   $orders = Cart::where('status', '!=','active')->orderBy('order_date', 'DESC')->get();
    $orders = Cart::where('status', '=','Approved')->orderBy('order_date', 'DESC')->get();
    $users = User::all();
    return view('admin.orders.index', compact('orders', 'users'));
    }

// Mostramos los Pedidos Cancelados
    public function canceled()
    {
    //   $orders = Cart::where('status', '!=','active')->orderBy('order_date', 'DESC')->get();
    $orders = Cart::where('status', '=','Cancelled')->orderBy('order_date', 'DESC')->get();
    $users = User::all();
    return view('admin.orders.index', compact('orders', 'users'));
    }

// Mostramos el Pedido con su detalle
    public function show($id)
    {
        $order = Cart::findOrFail($id);
        $users = User::all();

        return view('admin.orders.show')->with(compact('order', 'users'));
    }
// Mostramos el Stado del pedido a Contactado
    public function edit($id)
    {
        $order = Cart::findOrFail($id);
        $users = User::all();

        return view('admin.orders.edit')->with(compact('order', 'users'));

    }

// Cambiamos el Estado del Pedido
    public function update(Request $request, $id)
    {

        $cart = Cart::findOrFail($id);
        $cart->status = $request->input('status');
        $cart->order_date = Carbon::now();
        $cart->save(); //UPDATE

        // Redireccionamos una vez realizado el insert
        // return redirect('admin/orders');

        $user_id = $cart->user_id;
        $client = User::findOrFail($user_id);
        $client_email = $client->email;

        Mail::to($client_email)->send(new UpdateUserOrder($client, $cart));
        $notification =  'El pedido se ha Actualizado correctamente. Le enviamos un Email al Cliente para Avisarle.';
        return back()->with(compact('notification'));


    }

// Eliminamos el PEDIDO
   public function destroy($id)
   {
        $cart = Cart::find($id);
        // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $cart->delete();
        return back();

   }

}
