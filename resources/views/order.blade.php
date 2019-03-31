@extends('layouts.app')
@section('title','PEDIDO')

@section('body-class','profile-page sidebar-collapse')

@section('content')

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto ">
              @if (session('notification'))
                  <div class="mt-2 alert alert-success" role="alert">
                      {{ session('notification') }}
                  </div>
              @endif

              <div class="name">
                  <h3 class="title">Datos del Pedido<span class="float-right"><a class="btn btn-default btn-round" href="/dashboard">Volver</a></span></h3>
                  <h4>Solicitado por: {{ auth()->user()->name  }}</h4>
                  <h4>Fecha del Pedido: {{ $orders->order_date  }}</h4>
                  <h4>Total a pagar $: {{ $orders->total  }}</h4>
                  <h4>Status: {{ $orders->status  }}</h4>
              </div>
                <h3 class="title">Detalles del Pedido</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-left">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->details as $detail)
                        <tr>
                            <td class="text-center"><img src="{{ $detail->product->featured_image_url }}" height="50"></td>
                            <td><a href="{{ url('/products/'.$detail->product->id)}}" target="_blank">{{ $detail->product->name }}</a></td>
                            <td class="text-center">$ {{ $detail->product->price }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-center">$ {{ $detail->quantity *  $detail->product->price }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            {{-- </div> --}}
          </div>
        </div>
        <div class="description text-center">
          {{-- <p>{{ $product->long_description }}</p> --}}
        </div>


      </div>
    </div>
  </div>


@include('includes.footer')

@endsection
