
@extends('layout')

@section('titulo')
  COMISSARIA - Autorização
@endsection

@section('topo')
  COMISSARIA - Autorização
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
            <th class="center">Data de Abertura</th>
            <th class="center">Autorização</th>
            <th class="center">Ação</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($comissaria as $comissarias)
            <tr>
              <th scope="row">{{ $comissarias->id }}</th>
              <td class="center" style="width: 15%" >{{ $comissarias->os}}</td>
              <td class="center" style="width: 30%" >{{ $comissarias->postoGrad }} {{$comissarias->nomeGuerra}}</td>
              <td class="center" style="width: 15%">{{ $comissarias->unidade }}</td>
              <td class="center" style="width: 12%">{{ $comissarias->procedencia }}</td>
              <td class="center" style="width: 12%">{{ $comissarias->destino }}</td>
              <td class="center" style="width: 20%">{{ date('d/m/Y H:i', strtotime($comissarias->created_at)) }}</td>
              <td class="center" style="width: 15%">
                @if ($comissarias->autoriza == 'not')
                  <i class="material-icons tooltipped" data-tooltip="NÃO autorizado pelo OPO ou OF. de ligação" >lock</i>
                @elseif ($comissarias->autoriza == 'new')
                  <i class="material-icons tooltipped" data-tooltip="Aguardando autorização" >av_timer</i>
                @elseif ($comissarias->autoriza == 'ok')
                  <i class="material-icons tooltipped" data-tooltip="Autorizado" >spellcheck</i>
                @endif
              </td>
              <td class="center" style="width: 15%">
                <ul class="list-inline list-small">
                  <li>
                    @if (($comissarias->atendimento == 'new') AND ($comissarias->autoriza == 'new') )
                        <a href="{{ route('oficiais.show', ['comissarias' => $comissarias->id]) }}" class="btn-floating tooltipped waves-effect waves-light green" data-tooltip='Autorizar'><i class="material-icons">search</i></a>
                    @endif
                  </li>
                </ul>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
