
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
  <div class="row">
    <div class="center">
      <img src="/imagens/acantoNew.png" alt="acanto" width="250em" height="270em">
    </div>
  </div>
@if (Session::has('mensagem_create'))
   <div class="card-panel teal lighten-4">{{Session::get('mensagem_create')}}</div>
@endif
<!--  <div style="margin-top: 50px" class="row">
    <div class="col s3 offset-s3">
      <a class="waves-effect waves-light btn" href=""><i class="material-icons left">border_color</i>Fazer Requisição</a>
    </div>
  <div class="col s3 offset-s1">
      <a class="waves-effect waves-light btn" href=""><i class="material-icons left">desktop_windows</i>Ver Requisições</a>
    </div>
  </div>-->
  <div style="margin-top: 40px" class="row">
    <div class="col s11">
      <blockquote>
        Aviso: As solicitações de lanche de bordo deverão ser solicitadas pelo Cmte da aeronave!<br>
        Dúvidas quanto ao preenchimento, favor entrar em contato via ramal com a Comissaria do Rancho.
      </blockquote>
    </div>
  </div>
</div>

@endsection
@section('rodape')
  <footer class="page-footer">
     <div class="container">
       <div class="footer-copyright">
         <div class="container">
            © 2017 Desenvolvido pela ATIC-CG
          </div>
     </div>
   </div>
  </footer>
@endsection
