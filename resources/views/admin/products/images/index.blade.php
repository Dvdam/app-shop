
@extends('layouts.app')
@section('title','Imágenes de Productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">

  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Imagenes del Producto "{{ $product->name  }}"</h2>
        <hr><br>
        <!-- Si se deja el action vacio en el formulario la ruta es la misma en la que se esta trabajando -->
        <!-- Para permitir la subida de archivos mediante un formulario debe contener  " enctype="multipart/form-data"  "-->
        <form method="post" action="" enctype="multipart/form-data">
          @csrf
          <!-- El input se creo para subir la foto con nombre name=photo -->
          <input type="file" name="photo" required>
          <!-- Input creado para subir la foto -->
          <button type="submit" class="btn btn-primary btn-round">Subir Nueva Imagen</button>
          <a style="margin-left: auto; margin-right: auto;" href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al Listado de Productos</a>
        </form>
        <hr><br>




        




        <div class="row">
          @foreach ($images as $image)
          <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="{{ $image->url }}" width="260" alt="Card image cap">
              <form method="post" action="">
              @csrf
              @method('DELETE')
              <input type="hidden" name="image_id" value="{{ $image->id }}">
              <button type="submit" class="btn btn-danger btn-round" title="Eliminar">Eliminar Imagen</button>
              @if ($image->featured)
                <button type="button" rel="tooltip" title="Imagen Destacada" class="btn btn-info btn-fab btn-fab-mini btn-round">
                  <i class="material-icons">favorite</i>
                </button>
              @else
                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'. $image->id) }}" rel="tooltip" title="Destacar Imagen" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                  <i class="material-icons">favorite</i>
                </a>
              @endif
              </form>
              
<!--               <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div> -->
            </div>
          </div>
          @endforeach
        </div>
        

      </div>
    </div>
  </div>
@include('includes.footer')
@endsection
