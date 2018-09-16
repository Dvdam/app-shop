@extends('layouts.app')
@section('title','Bienvenido a App Shop by Laravel')

@section('body-class','landing-page sidebar-collapse')

<!-- Declaramos una nueva seccion para nuestro archivo de estilos con la directiva arrobayield en app.blade -->
@section('styles')
<style>
  .team .row .col-md-4{margin-bottom:1em;}

  /*PAra evitar problamas de altura con boostrap hacemos lo sgte*/
  .row{
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
  }

  .row > [class*='col-']{
    display:flex;
    flex-direction: column;
  }


  /*Termina solucion de altura*/


</style>

@endsection
<!-- Termina nuestra seccion creada para los estilos -->


@section('content')
 <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">App Shop by Laravel</h1>
          <h4>Realiza tus pedidos en línea y te contactaremos para coordinar la Entrega</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo Funciona?</a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">¡Por qué App Shop</h2>
            <h5 class="description">Podes revisar toda nuestra Colección de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atendemos tus Dudas</h4>
                <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás sólo, sino que siempre estamos atentos a tus inquietudes.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Pago Seguro</h4>
                <p>Todo pedido que realices será confirmado a travéz de una llamda. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado. </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Información Privada</h4>
                <p>Los pedidos que realices sólo los conocerás vos a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <h2 class="title">Productos Disponible</h2>
        <div class="team">
          <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name}}" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">
                    <a href="{{ url('/products/'.$product->id) }}">{{ $product->name}}</a>
                    <br>
                    <small class="card-description text-muted">{{ $product->category->name}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{ $product->description }}</p>
                  </div>

 <!--                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div> -->
                </div>
              </div>
            </div>
            @endforeach
          </div>

            <!-- Creamos un div para mostarr la paginacion -->
            <div class="row">
              <div class="ml-auto mr-auto">
              {{ $products->links() }}
              </div>
              
            </div>
            <!-- Termina el div creado apra mostrar la paginacion -->

        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿Aún no te Registraste?</h2>
            <h4 class="text-center description">Regístrate ingresando tus datos básicos y podrás realizar tus pedios a través de nuestro carrito de compras. Si aún no te decidis, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Tu Mensaje</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised"> Enviar Consulta </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')

@endsection
