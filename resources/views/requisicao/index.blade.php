
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
            <th class="center">N°</th>
            <th class="center">Ord Missão</th>
            <th class="center">Solicitante</th>
            <th class="center">Unidade</th>
            <th class="center">Procedência</th>
            <th class="center">Destino</th>
            <th class="center">Autorização</th>
            <th class="center">Atendimento</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($comissaria as $comissarias)
            <tr>
              <th scope="row">{{ $comissarias->id }}</th>
              <td class="center" style="width: 15%" >{{ $comissarias->os}}</td>
              <td class="center" style="width: 25%" >{{ $comissarias->postoGrad }} {{$comissarias->nomeGuerra}}</td>
              <td class="center" style="width: 15%">{{ $comissarias->unidade }}</td>
              <td class="center" style="width: 15%">{{ $comissarias->procedencia }}</td>
              <td class="center" style="width: 15%">{{ $comissarias->destino }}</td>
              <td class="center" style="width: 15%">
                @if ($comissarias->autoriza == 'not')
                  <i class="material-icons tooltipped" data-tooltip="NÃO autorizado pelo OPO ou OF. de ligação" >lock</i>
                @elseif ($comissarias->atendimento == 'new')
                  <i class="material-icons tooltipped" data-tooltip="Aguardando autorização" >av_timer</i>
                @elseif ($comissarias->autoriza == 'ok')
                  <i class="material-icons tooltipped" data-tooltip="Autorizado" >spellcheck</i>
                @endif
              </td>
              <td class="center" style="width: 15%">
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
