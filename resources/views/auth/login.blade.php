@extends('layouts.app')

@section('body-class','login-page sidebar-collapse')

@section('content')
  <div class="page-header header-filter" style="background-image: url('{{ asset ('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">

    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicio de Sesión</h4>
              </div>
              <p class="description text-center">Ingresa tus Datos</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">how_to_reg</i>
                    </span>
                  </div>
                  <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif



                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <!-- <input type="password" class="form-control" placeholder="Password..."> -->
                  <input id="password" type="password" placeholder="Password..." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>
                <div class="input-check">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Recordar Sesión
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>

             </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</button>
              </div>
            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a> -->

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('includes.footer')

@endsection
