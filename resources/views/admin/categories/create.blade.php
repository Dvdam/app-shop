@extends('layouts.app')
@section('title','Edita las Categorias de tus productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
 </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Agregar Nueva Categoría</h2>

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
        <form method="post" action="{{ url('/admin/categories')}}" enctype="multipart/form-data">
           @csrf
           <div class="row">
              <div class="col-sm-6">
                <div class="form-group bmd-form-group text-left">
                  <label class="bmd-label-floating">Nombre de la Categoría</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                </div>
              </div>
<!--               <div class="col-sm-6">
                  <label class="fileinput-new">Imagen de la Categoría</label><br>
                  <input type="file" name="image">
              </div> -->

              <div class="col-sm-6">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <span class="btn btn-raised btn-round btn-primary btn-file">
                     <span class="fileinput-new">Imagen de la Categoría</span>
                     <input type="file" name="image" />
                  </span>
                </div>
              </div>
                
              </div>




           </div>
          <textarea class="form-control" placeholder="Descripción de la Categoría" rows="5" name="description">{{ old('description')}}</textarea>
          <button class="btn btn-primary">Agregar Categoría</button>
          <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
        </form>

      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
