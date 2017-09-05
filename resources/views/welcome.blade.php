
@extends('layout')

@section('titulo')
  COMISSARIA - Home
@endsection

@section('topo')
  COMISSARIA - Requisições
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
    <a class="btn tooltipped btn-floating pulse red " href="{{ route('avisos') }}" data-position="top" data-delay="50" data-tooltip="Avisos"><i class="material-icons">error</i></a>
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
