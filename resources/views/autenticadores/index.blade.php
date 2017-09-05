
@extends('layout')

@section('titulo')
  COMISSARIA - Oficiais Autenticadores
@endsection

@section('topo')
  COMISSARIA - Oficiais Autenticadores
@endsection


@section('conteudo')
  <div class="container">
<br>
<div class="row">
<div class="col s12 center">
  <a class="btn tooltipped btn-floating green" href="{{ route('autenticadores.create')}}" data-position="top" data-delay="50" data-tooltip="Cadastrar novo Autenticador"><i class="material-icons">device_hub</i></a>
</div>

</div>

    <div class="row">
      <div class="col s11">
        <blockquote>
          Relação de oficiais que autorizam as Requisições.
        </blockquote>
      </div>
    </div>

 @if (Session::has('mensagem_create'))
     <div class="card-panel teal lighten-4">{{Session::get('mensagem_create')}}</div>
 @endif
  <table id="pesquisa">
        <thead>
          <tr>
            <th class="center">N°</th>
            <th class="center">SARAM</th>
            <th class="center">Posto</th>
            <th class="center">Nome</th>
            <th class="center">Contato</th>
            <th class="center">Esquadrão</th>
            <th class="center">Ação</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($autenticadores as $autenticador)
            <tr>
              <th class="center" scope="row">{{ $autenticador->id }}</th>
              <td class="center" style="width: 10%" >{{ $autenticador->saram }}</td>
              <td class="center" style="width: 10%">{{ $autenticador->posto }}</td>
              <td class="center" style="width: 30%">{{ $autenticador->nome }}</td>
              <td class="center" style="width: 15%">{{ $autenticador->contato }}</td>
              <td class="center" style="width: 20%">{{ $autenticador->esquadrao }}</td>
              <td class="center" style="width: 40%">
                <ul class="list-inline">
                  <li>
                      <a href="{{ route('autenticadores.show', ['autenticadores' => $autenticador->id]) }}" class="btn-floating tooltipped btn-small waves-effect waves-light green" data-tooltip='Ver oficial'><i class="material-icons">search</i></a>
                      <!--<a href="{{ route('autenticadores.edit', ['autenticadores' => $autenticador->id]) }}" class="btn-floating tooltipped btn-small waves-effect waves-light yellow" data-tooltip='Editar cadastro'><i class="material-icons">edit</i></a>-->
                  </li>
                </ul>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
