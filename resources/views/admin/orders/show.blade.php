@extends('layouts.app')
@section('title','PEDIDO')

@section('body-class','profile-page sidebar-collapse')

@section('content')

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
              @if (session('notification'))
                  <div class="alert alert-success" role="alert">
                      {{ session('notification') }}
                  </div>
              @endif

              <div class="name">
                @foreach ($users as $user)
                    @if ($user->id == $order->user_id)
                        <h3 class="title">Cliente: {{ $user->name }}<span class="float-right"><a class="btn btn-default btn-round" href="/admin/orders">Volver</a></span></h3>
                        <h6>Email: {{ $user->email  }}</h6>
                        <h6>Telefono: {{ $user->phone  }}</h6>
                    @endif
                @endforeach
                        <h6>Fecha del Pedido: {{ $order->order_date }}</h6>
                        <h6>Status Pedido: {{ $order->status  }}</h6>
                        <h6>Total Pedido $: {{ $order->total  }}</h6>



              </div>
                <h3 class="title">Detalles del Pedido</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-2 text-center">Imagen</th>
                            <th class="col-lg-2 text-center">Nombre</th>
                            <th class="col-lg-2 text-center">Precio</th>
                            <th class="col-lg-2 text-center">Cantidad</th>
                            <th class="col-lg-2 text-center">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->details as $detail)
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
