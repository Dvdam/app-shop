
@extends('layouts.app')
@section('title','Listado de Categorías')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">

  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de Categorías</h2>
        <div class="team">
          <div class="row">
            <a style="margin-left: auto; margin-right: auto;margin-bottom: 15px;" href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nuevo Categoría</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-lg-2 text-center">ID</th>
                        <th class="col-lg-3 text-center">Nombre</th>
                        <th class="col-lg-4 text-center">Descripción</th>
                        <th class="col-lg-3 text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  <!-- Para mostrar un numero en lugar del id añadimos una clave $key -->
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="td-actions text-center">
                            <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                              @csrf
                              @method('DELETE')
                                <a class="btn btn-info btn-fab btn-fab-mini btn-round" href="#" rel="tooltip" title="Ver Categoría">
                                <i class="material-icons">info</i>
                              </a>

                              <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Categoría" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                <i class="material-icons">edit</i>
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
            {{ $categories->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
