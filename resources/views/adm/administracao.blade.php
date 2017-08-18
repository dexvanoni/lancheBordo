
@extends('layout')

@section('titulo')
  COMISSARIA - Administração
@endsection

@section('topo')
  COMISSARIA - Adm
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
            <th>Data de Abertura</th>
            <th>Ação</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($comissaria as $comissarias)
            <tr>
              <th scope="row">{{ $comissarias->id }}</th>
              <td style="width: 15%" >{{ $comissarias->os}}</td>
              <td style="width: 30%" >{{ $comissarias->postoGrad }} {{$comissarias->nomeGuerra}}</td>
              <td style="width: 15%">{{ $comissarias->unidade }}</td>
              <td style="width: 12%">{{ $comissarias->procedencia }}</td>
              <td style="width: 12%">{{ $comissarias->destino }}</td>
              <td style="width: 20%">{{ $comissarias->created_at }}</td>
              <td style="width: 15%">
                <ul class="list-inline list-small">
                  <li title="Editar">
                    <a href="{{ route('requisicao.show', ['comissarias' => $comissarias->id]) }}" class="btn-floating tooltipped waves-effect waves-light red" data-tooltip='Ver Requisição'><i class="material-icons">search</i></a>
                  </li>
                </ul>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
