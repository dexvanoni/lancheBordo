
@extends('layout')

@section('titulo')
  COMISSARIA - Relatórios
@endsection

@section('topo')
  COMISSARIA - Relatórios
@endsection


@section('conteudo')
  <div class="container">
    <div class="row">
<div class="container">

      <div class="col s6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Total de Requisições atendidas {{$ano}}</span>
            <h3 class="center">{{$total}}</h3>
          </div>
        </div>
      </div>

      <div class="col s6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Total de Requisições não atendidas {{$ano}}</span>
            <h3 class="center">{{$total2}}</h3>
          </div>
        </div>
      </div>

    </div>
    </div>

{{ Form::open(array('action'=>'RequisicaoController@pesquisa', 'class' => 'form-horizontal', 'method' => 'post')) }}
    <div class="row">
      <div class="container">
      <div class="col s12">
          <h6>Filtrar por datas</h6>
          <div class="input-field inline">
            <label for="de" data-error="wrong">De</label>
            <input type="text" class="datepicker" name="de">
          </div>

          <div class="input-field inline">
            <label for="ate" data-error="wrong">Até</label>
              <input type="text" class="datepicker" name="ate">
          </div>

          <button class="btn waves-effect waves-light" type="submit" name="button">Filtrar
          <i class="material-icons left">search</i>
          </button>
      </div>
      </div>
    </div>
{{ Form::close() }}

<div class="container" id="print" name="print">

@if(isset($qtn))
  <div class="row">
    <div class="container">
      <div class="right">
        {!! Form::submit('imprimir', ['id' => 'imprimir', 'onclick' => 'cont()', 'class' => 'btn btn-info pull-right']) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Requisições atendidas pela Comissaria-GAPCG no período de {{$de}} a {{$ate}}</span>
          <h6>Total: {{$tot}}</h6>
            <table>
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Ord Missão</th>
                  <th>Solicitante</th>
                  <th>Unidade</th>
                  <th>Procedência</th>
                  <th>Destino</th>
                  <th>N° Envolvidos</th>
                </tr>
              </thead>

            <tbody>

                @foreach ($qtn as $qtns)
                  <tr>
                    <th scope="row">{{ $qtns->id }}</th>
                    <td style="width: 15%" >{{ $qtns->os}}</td>
                    <td style="width: 25%" >{{ $qtns->postoGrad }} {{$qtns->nomeGuerra}}</td>
                    <td style="width: 15%">{{ $qtns->unidade }}</td>
                    <td style="width: 15%">{{ $qtns->procedencia }}</td>
                    <td style="width: 15%">{{ $qtns->destino }}</td>
                    <td style="width: 15%">{{ $qtns->militares_count }}</td>
                  </tr>
                @endforeach

            </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endif

  </div>
<script type="text/javascript">
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('about:blank');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script>

@endsection
