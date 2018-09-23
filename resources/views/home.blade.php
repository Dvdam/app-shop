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
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito de Compras
                </a>
            </li>
<!--             <li class="nav-item">
                <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i>
                    Schedule
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos Realizados
                </a>
            </li>
        </ul>

<!-- Ahora mostramos todos los productos del carrito de compras del usuario autentificado -->
        <hr>
        <p class="tab-content tab-space">
              Tenes {{ auth()->user()->cart->details->count() }} Producto(s) en tu Carrito de Compras
        </p>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-lg-2 text-center">Imagen</th>
                    <th class="col-lg-2 text-center">Nombre</th>
                    <th class="col-lg-2 text-center">Precio</th>
                    <th class="col-lg-2 text-center">Cantidad</th>
                    <th class="col-lg-2 text-center">SubTotal</th>
                    <th class="col-lg-2 text-center">Opciones</th>
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
        <hr>
        <form method="post" action="{{ url('/order')}}">
            @csrf
            <button class="btn btn-primary btn-round">
              <i class="material-icons">done</i> Realizar Pedido
            </button>
            
        </form>








        <div class="tab-content tab-space">
            <div class="tab-pane active" id="dashboard-1">
              Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
              <br><br>
              Dramatically visualize customer directed convergence without revolutionary ROI.
            </div>
<!--             <div class="tab-pane" id="schedule-1">
              Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
              <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
            </div> -->
            <div class="tab-pane" id="tasks-1">
                Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
            </div>
        </div>

        </div>

    </div>
  </div>
@include('includes.footer')

@endsection