@extends('layouts.app')
@section('title','Edita la Categoría')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
 </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Editar Categoría Seleccionada</h2>
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
        <!-- Termina la directiva de validacion -->
        <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
           @csrf
           <div class="row">
              <div class="col-sm-6">
                <div class="form-group bmd-form-group text-left">
                  <label class="bmd-label-floating">Nombre de la Categoría</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name' , $category->name) }}">
                </div>
              </div>
           </div>
          <textarea class="form-control" placeholder="Descripción de la Categoría" rows="5" name="description">{{ old('description' , $category->description) }}</textarea>
          <button class="btn btn-primary">Guardar Cambios</button>
          <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
        </form>

      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
