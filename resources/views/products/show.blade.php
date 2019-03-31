@extends('layouts.app')
@section('title','App Shop | Dashboard')

@section('body-class','profile-page sidebar-collapse')

@section('content')

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{ $product->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ $product->name }}</h3>
                <h6>{{ $product->category->name }}</h6>
              </div>

              @if (session('notification'))
                  <div class="alert alert-success" role="alert">
                      {{ session('notification') }}
                  </div>
              @endif

            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>{{ $product->long_description }}</p>
        </div>


        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="text-center">
              @if (auth()->check())
                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                  <i class="material-icons">add</i> Añadir al Carrito de Compras
                </button>
              @else
                <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
                  <i class="material-icons">add</i> Añadir al Carrito de Compras
                </a>
              @endif
            </div>
          </div>
        </div>

<!--         <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="material-icons">camera</i> Studio
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="material-icons">palette</i> Work
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                    <i class="material-icons">favorite</i> Favorite
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="studio">
            <div class="row">
              <div class="col-md-3 ml-auto">
                @foreach ($imagesLeft as $image)
                <img src="{{ $image->url}}" class="rounded">
                @endforeach
              </div>
              <div class="col-md-3 mr-auto">
                @foreach ($imagesRight as $image)
                <img src="{{ $image->url}}" class="rounded">
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione la Cantidad que desea Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control" min="1" pattern="^[0-9]+">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir al Carrito</button>
          </div>

      </form>
    </div>
  </div>
</div>

@include('includes.footer')

@endsection
