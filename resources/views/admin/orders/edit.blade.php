@extends('layouts.app')
@section('title', 'Bienvenido a ' . config('app.name'))

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
 </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Editar el Estado del Pedido<span class="float-right"><a class="btn btn-default btn-round" href="/admin/orders">Volver</a></h2>
        <!-- Directiva para mostrar los errores de validacion -->
        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>

          </div>
        @endif

        @if (session('notification'))
        <div class="mt-2 alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
        @endif


        <div class="name">
            @foreach ($users as $user)
                @if ($user->id == $order->user_id)
                    <h3 class="title">Cliente: {{ $user->name }}</span></h3>
                    <h6>Email: {{ $user->email  }}</h6>
                    <h6>Telefono: {{ $user->phone  }}</h6>
                @endif
            @endforeach
                    <h6>Fecha del Pedido: {{ $order->order_date }}</h6>
                    <h6>Total Pedido $: {{ $order->total  }}</h6>
                    {{-- <h6>Status Pedido: {{ $order->status  }}</h6> --}}
                    <h6>
                        <form method="post" action="{{ url('/admin/orders/'.$order->id.'/edit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status del Pedido</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="status" id="status">
                                    <option selected disabled>{{ $order->status }}</option>
                                    <option value="Approved">Aprobado</option>
                                    <option value="Pending">Pendiente</option>
                                    <option value="Cancelled">Cancelado</option>
                                    <option value="Finished">Finalizado</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/admin/orders') }}" class="btn btn-default">Cancelar</a>
                        </form>
                    </h6>

        </div>
      </div>
    </div>
  </div>
@include('includes.footer')
@endsection


