
@extends('layout')

@section('titulo')
  Comissaria | Of. Login
@endsection

@section('topo')
  Comissaria | Login
@endsection

@section('conteudo')

  <div class="container">
<div class="row">
  <div class="col s4 offset-s2">
    <blockquote>
      Digite o SARAM e a senha do antigo Sistema SASIS. <br>
      Área destinada aos Oficiais de Ligação  e ao OPO.
    </blockquote>
  </div>
</div>
    <div class="row">

      <div class="col s4 offset-s4">

<h5 class="center" style="color: #2196f3">Entrar</h2>
  <br>
          <!--<div class="progress">
              <div class="indeterminate"></div>
          </div>-->

            {{ Form::open(array('action'=>'LoginController@doLogin', 'class' => 'form-horizontal', 'method' => 'post')) }}

              <div class="form-group">
                <label for="pescodigo" class="col-md-4 control-label">SARAM</label>

                <div class="col-md-6">
                  <input id="pescodigo" type="text" class="form-control" name="pescodigo" value="{{ old('pescodigo') }}" required autofocus>

                </div>
              </div>

              <div class="form-group">
                <label for="sasis_senha" class="col-md-4 control-label">Senha</label>

                <div class="col-md-6">
                  <input id="sasis_senha" type="password" class="form-control" name="password" required>


                </div>
              </div>

              <div class="center form-group">
                <div class="col-md-8 col-md-offset-4">

                <button class="btn waves-effect waves-teal" type="submit" name="action">Entrar</button>

                </div>

              </div>
              @if (Session::has('msgLogin'))
                <br>
                <div style="background-color: #ffcdd2" class="center chip">
                  {{Session::get('msgLogin')}}
                </div>
              @endif
          {{ Form::close() }}
          </div>
        </div>
      </div>
@endsection
