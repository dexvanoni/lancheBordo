
@extends('layout')

@section('titulo')
  COMISSARIA - Requisições
@endsection

@section('topo')
  COMISSARIA - Ver Requisições
@endsection


@section('conteudo')
  <div class="container">
<br>
  <table id="pesquisa">
        <thead>
          <tr>
            <th>N°</th>
            <th>Ord Missão</th>
            <th>Solicitante</th>
            <th>Unidade</th>
            <th>Procedência</th>
            <th>Destino</th>
            <th>Atendimento</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($comissaria as $comissarias)
            <tr>
              <th scope="row">{{ $comissarias->id }}</th>
              <td style="width: 15%" >{{ $comissarias->os}}</td>
              <td style="width: 35%" >{{ $comissarias->postoGrad }} {{$comissarias->nomeGuerra}}</td>
              <td style="width: 15%">{{ $comissarias->unidade }}</td>
              <td style="width: 15%">{{ $comissarias->procedencia }}</td>
              <td style="width: 15%">{{ $comissarias->destino }}</td>
              <td style="width: 15%">
              @if ($comissarias->atendimento == 'new')
                <i class="material-icons tooltipped" data-tooltip="Em atendimento" >av_timer</i>
              @elseif ($comissarias->atendimento == 'ok')
                <i class="material-icons tooltipped" data-tooltip="Atendido" >check</i>
              @elseif ($comissarias->atendimento == 'not')
                <i class="material-icons tooltipped" data-tooltip="Recusado" >close</i>
              @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
