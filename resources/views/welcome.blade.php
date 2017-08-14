
@extends('layout')

@section('titulo')
  COMISSARIA - Home
@endsection

@section('topo')
  COMISSARIA
@endsection


@section('conteudo')

<div class="container">
  <div class="row">
    <div style="margin-top: 20px" class="col offset-s12">
        <a class="btn tooltipped btn-floating pulse" href="/login" data-position="top" data-delay="50" data-tooltip="Administração"><i class="material-icons">person</i></a>
    </div>
  </div>

  <div style="margin-top: 150px" class="row">
    <div class="col s6 offset-s5">
      <a class="waves-effect waves-light btn" href="{{ route('requisicao.create')}}"><i class="material-icons left">cloud</i>Fazer Requisição</a>
    </div>
  </div>
  <div style="margin-top: 80px" class="row">
    <div class="col s11">
      <blockquote>
        Aviso: As solicitações de lanche de bordo deverão ser solicitadas pelo Cmte da aeronave!<br>
        Dúvidas quanto ao preenchimento, favor entrar em contato via ramal com a Comissaria do Rancho.
      </blockquote>
    </div>
  </div>
</div>

@endsection
