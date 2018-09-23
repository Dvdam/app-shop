@extends('layouts.app')
@section('title','Bienvenido a App Shop by Laravel')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
 </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Editar Producto Seleccionado</h2>
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
        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
           @csrf
           <div class="row">
              <div class="col-sm-6">
                <div class="form-group bmd-form-group text-left">
                  <label class="bmd-label-floating">Nombre del Producto</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name' , $product->name) }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group bmd-form-group text-left">
                  <label class="bmd-label-floating">Precio del Producto</label>
                  <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price' , $product->price) }}">
                </div>
              </div>
           </div>
           <div class="row">
              <div class="col-sm-6">
                <div class="form-group bmd-form-group text-left">
                  <label class="bmd-label-floating">Descripción Breve</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description' , $product->description) }}">
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-control">
                <label >Categoría del Producto</label>
                <select class="form-control selectpicker" name="category_id" data-style="btn btn-link">
                  <option value="0">General</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" 
                    @if($category->id == old('category->id', $product->category_id)) selected @endif>
                    {{ $category->name }}</option>
                  @endforeach
                </select>

              </div>
              </div>

           </div>




          <textarea class="form-control" placeholder="Descripción Completa del Producto" rows="5" name="long_description">{{ old('long_description' , $product->long_description) }}</textarea>
          <button class="btn btn-primary">Guardar Cambios</button>
          <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
        </form>

      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
