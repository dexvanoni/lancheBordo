
@extends('layout')

@section('titulo')
  COMISSARIA - Login ADM
@endsection

@section('topo')
  COMISSARIA - Login
@endsection


@section('conteudo')

  <div class="container">
<br><br>
    <div class="col s11">
      <blockquote>
        Este login deverá ser realizado pelos militares da Comissaria do Rancho.
      </blockquote>
    </div>

    <div class="row">

      <div class="col s4 offset-s4">
<br>
<h5 style="color: #2196f3">Entrar na Comissaria</h2>
  <br>
          <!--<div class="progress">
              <div class="indeterminate"></div>
          </div>-->

            {{ Form::open(array('action'=>'LoginAdmController@login', 'class' => 'form-horizontal', 'method' => 'post')) }}

              <div class="form-group">
                <label for="login" class="col-md-4 control-label">Login</label>

                <div class="col-md-6">
                  <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>

                </div>
              </div>

              <div class="form-group">
                <label for="senha" class="col-md-4 control-label">Senha</label>

                <div class="col-md-6">
                  <input id="senha" type="password" class="form-control" name="password" required>


                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">

                <button class="btn waves-effect waves-teal" type="submit" name="action">Entrar</button>

                </div>

              </div>
          {{ Form::close() }}
          </div>
        </div>
      </div>
@endsection
