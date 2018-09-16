
@extends('layouts.app')
@section('title','Listado de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">

  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
          <div class="row">
            <a style="margin-left: auto; margin-right: auto;margin-bottom: 15px;" href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-lg-1 text-center">ID</th>
                        <th class="col-lg-2 text-center">Nombre</th>
                        <th class="col-lg-3 text-center">Descripción</th>
                        <th class="col-lg-2 text-center">Categoría</th>
                        <th class="col-lg-1 text-center">Precio</th>
                        <th class="col-lg-3 text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                        <td class="text-center">$ {{ $product->price }}</td>
                        <td class="td-actions text-center">
<!--                             <a href="#" rel="tooltip" title="Ver Producto" class="btn btn-info btn-round">
                                <i class="material-icons">info</i>
                            </a>
                            <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                            </a> -->
<!--                             <a href="{{ url('/admin/products/{id}/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success  btn-simple btn-xs">
                                <i class="material-icons">edit</i>
                            </a> -->
                            <!-- <form method="post" action="{{ url('/admin/products/'.$product->id.'/delete') }}"> -->
                            <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                              @method('DELETE')
                              @csrf
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
<!--                               <a href="#" rel="tooltip" title="Ver Producto" class="btn btn-info btn-round">
                                  <i class="material-icons">info</i>
                              </a>
 -->
                              <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="#" rel="tooltip" title="Ver Producto">
                                <i class="material-icons">info</i>
                              </a>

                              <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                <i class="material-icons">edit</i>
                              </a>


<!--                               <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-round">
                                  <i class="material-icons">edit</i>
                              </a> -->

                              <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del Producto" class="btn btn-warning btn-fab btn-fab-mini btn-round">
                                <i class="material-icons">image</i>
                              </a>

<!--                               <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del Producto" class="btn btn-warning btn-round">
                                  <i class="material-icons">image</i>
                              </a> -->
                              <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round" rel="tooltip" title="Eliminar">
                                <i class="material-icons">close</i>
                              </button>





                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $products->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
