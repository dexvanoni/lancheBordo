
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
    <div class="center">
      <br><br>
      <img src="/imagens/acantoNew.png" alt="acanto" width="250em" height="270em">
    </div>
  </div>
  <div style="margin-top: 20px" class="center col s2">
    <a class="btn tooltipped btn-floating pulse " href="{{ route('requisicao.index')}}" data-position="top" data-delay="50" data-tooltip="Ver Requisições"><i class="material-icons">storage</i></a>
    <a class="btn tooltipped btn-floating pulse " href="{{ route('requisicao.create')}}" data-position="top" data-delay="50" data-tooltip="Nova Requisições"><i class="material-icons">touch_app</i></a>
    <a class="btn tooltipped btn-floating pulse" href="/login" data-position="top" data-delay="50" data-tooltip="Comissaria"><i class="material-icons">local_dining</i></a>
    <a class="btn tooltipped btn-floating pulse " href="/log" data-position="top" data-delay="50" data-tooltip="Autenticadores"><i class="material-icons">event_available</i></a>
  </div>
{{--@if (Session::has('mensagem_create'))
   <div class="card-panel teal lighten-4">{{Session::get('mensagem_create')}}</div>
@endif--}}
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
        Avisos:<br>
        - As solicitações de lanche de bordo deverão ser solicitadas pelo Cmte da aeronave!<br>
        - As requisições deverão ser autorizadas pelo OPO ou em caso de manobras, pelos Oficiais de ligação.<br>
        - Consulte o andamento de sua requisição.<br>
        - Fluxo da requisição: Criação da requisição / Autorização do OPO ou Of. Lig. / Atendimento da Comissaria / Retirada do material. <br>
        - Cada etapa do fluxo depende necessariamente da etapa anterior.<br>
        - Dúvidas quanto ao preenchimento, favor entrar em contato via ramal 3222 com a Comissaria do Rancho.
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
