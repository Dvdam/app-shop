
@extends('layouts.app')
@section('title','Listado de Pedidos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">

  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de Pedidos</h2>
        @include('includes.opciones-pedidos')
        <div class="team">
          <div class="row">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Fecha de Pedido</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Monto</th>
                        <th class="text-center">Opciones</th>

                        {{-- {{dd( $users )}} --}}
                    </tr>
                </thead>
                <tbody>
                    <!-- Para mostrar un numero en lugar del id añadimos una clave $key -->
                      @foreach ($orders as $key => $order)
                      <tr>
                          <td class="text-center">{{ $key+1 }}</td>
                          @foreach ($users as $user)
                            @if ($user->id == $order->user_id)
                                <td>{{ $user->name  }}</td>
                            @endif
                          @endforeach
                          <td>{{ $order->order_date }}</td>
                          <td>{{ $order->status }}</td>
                          <td>{{ $order->total }}</td>
                          <td class="td-actions text-center">
                                <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="{{ url('/admin/orders/'.$order->id) }}" rel="tooltip" title="Ver Pedido">
                                    <i class="material-icons">info</i>
                                </a>
                                <a href="{{ url('/admin/orders/'.$order->id.'/edit') }}" rel="tooltip" title="Editar Pedido" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                   <i class="material-icons">edit</i>
                                </a>
                              {{-- <form method="post" action="{{ url('/admin/orders/'.$order->id) }}">
                                @csrf
                                @method('DELETE')
                              <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="{{ url('/admin/orders/'.$order->id) }}" rel="tooltip" title="Ver Pedido">
                                  <i class="material-icons">info</i>
                                </a>

                                <a href="{{ url('/admin/orders/'.$order->id.'/edit') }}" rel="tooltip" title="Editar Estado del Pedido" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                  <i class="material-icons">edit</i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round" rel="tooltip" title="Eliminar">
                                  <i class="material-icons">close</i>
                                </button>
                             </form> --}}
                          </td>
                      </tr>
                      @endforeach

                  </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
