@extends('layouts.app')
@section('title','App Shop | Dashboard')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
 </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Dashboard</h2>
        @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        @endif
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito de Compras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos Realizados
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="dashboard-1">
<!-- Ahora mostramos todos los productos del carrito de compras del usuario autentificado -->
                <div class="tab-content tab-space">
                    @if(auth()->user()->cart->details->count() == 0)
                        <h4>Tu carrito esta Vacío. Visita nuestro <a href="{{ url('/')}}">SHOP</a></h4>
                    @else

                    Tenes {{ auth()->user()->cart->details->count() }} Producto(s) en tu Carrito de Compras
                    <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">SubTotal</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->cart->details as $detail)
                                <tr>
                                    <td class="text-center"><img src="{{ $detail->product->featured_image_url }}" height="50"></td>
                                    <td><a href="{{ url('/products/'.$detail->product->id)}}" target="_blank">{{ $detail->product->name }}</a></td>
                                    <td class="text-center">$ {{ $detail->product->price }}</td>
                                    <td class="text-center">{{ $detail->quantity }}</td>
                                    <td class="text-center">$ {{ $detail->quantity *  $detail->product->price }}</td>
                                    <td class="td-actions text-center">
                                        <form method="post" action="{{ url('/cart') }}">
                                           @csrf
                                           @method('DELETE')
                                          <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                          <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="{{ url('/products/'.$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver Producto">
                                            <i class="material-icons">info</i>
                                          </a>
                                          <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round" rel="tooltip" title="Eliminar">
                                            <i class="material-icons">close</i>
                                          </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                    </table>
                    <hr>
                    <p class="tab-content tab-space">
                        <strong>El total del Pedido es de: {{ auth()->user()->cart->total }} $</strong>
                    </p>
                    <form method="post" action="{{ url('/order')}}">
                        @csrf
                        <button class="btn btn-primary btn-round">
                            <i class="material-icons">done</i> Realizar Pedido
                        </button>
                    </form>

                    @endif
                </div>
            </div>
            <div class="tab-pane" id="tasks-1">
                <div class="tab-content tab-space">
                    @if ($orders->count() == 0)
                        <p>No tenes Pedidos realizados visita nuestro <a href="{{ url('/')}}">SHOP</a></p>
                    @else
                        <p>Tenes {{ $orders->count() }} Pedido(s) Realizado(s)</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha de Pedido</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $order->order_date }}</td>
                                    <td class="text-center">{{ $order->status }}</td>
                                    <td class="text-center">$ {{ $order->total }}</td>
                                    <td class="td-actions text-center">
                                            <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="{{ url('order/'.$order->id) }}" rel="tooltip" title="Ver Pedido">
                                                <i class="material-icons">info</i>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        </div>

    </div>
  </div>
@include('includes.footer')

@endsection
