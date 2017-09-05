
@extends('layout')

@section('titulo')
  COMISSARIA - Oficiais Autenticadores
@endsection

@section('topo')
  COMISSARIA - Oficial n° {{ $autenticadores->id}}
@endsection


@section('conteudo')

<div class="container">
  <br>
  <form class="" action="{{ route('autenticadores.destroy', ['autenticadores' => $autenticadores->id]) }}" onsubmit="return confirm('\nTem certeza que deseja fazer isso?'); return false;" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn-floating tooltipped btn-small waves-effect waves-light red" data-tooltip="Excluir cadastro" type="submit" name="action">
      <i class="material-icons right">delete_forever</i>
    </button>
  </form>
  <div class="row">
      <div class="right">
        {!! Form::submit('imprimir', ['id' => 'imprimir', 'onclick' => 'conti()', 'class' => 'btn btn-info pull-right']) !!}
      </div>
  </div>
  <div style="margin-left: 100px" id='printa'>
    <div class="row">
      <div class=" col s1">
        <h6>Código: {{$autenticadores->id}}</h6>
      </div>
      <div class=" col s3">
        <h6>SARAM: {{$autenticadores->saram}}</h6>
      </div>
      <div class=" col s3">
        <h6>Contato: {{$autenticadores->contato}}</h6>
      </div>
    </div>
    <div class="row">
      <div class="col s1">
        <h6>Posto: {{$autenticadores->posto}}</h6>
      </div>
      <div class="col s3">
        <h6>Nome: {{$autenticadores->nome}}</h6>
      </div>
      <div class="col s2">
        <h6>Cadastrado: {{date('d/m/Y', strtotime($autenticadores->created_at))}}</h6>
      </div>
    </div>
  </div>

</div><!--container-->
<script type="text/javascript">
function conti(){
   var conteudo = document.getElementById('printa').innerHTML;
   tela_impressao = window.open('about:blank');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script>
@endsection
