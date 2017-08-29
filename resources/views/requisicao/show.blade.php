
@extends('layout')

@section('titulo')
  COMISSARIA - Requisição Aberta
@endsection

@section('topo')
  COMISSARIA - Requisição n° {{ $comissaria->id}}
@endsection


@section('conteudo')
<div class="container">
  <div class="row">
    <div class="col s11">
      <blockquote>
        Verifique o preenchimento da requisição e selecione um modo de atendimento!
      </blockquote>
    </div>
  </div>
  <div class="row">
    <div class="container">
      <div class="right">
        {!! Form::submit('imprimir', ['id' => 'imprimir', 'onclick' => 'conti()', 'class' => 'btn btn-info pull-right']) !!}
      </div>
    </div>
  </div>
<div id='printa'>
  <div class="row">
    <div class="col s10 offset-s1">
      <div class="card-panel blue lighten-5">

      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">airplanemode_active</i>Dados da Missão</div>
          <div class="collapsible-body">

            <div class="row">
              <div class="input-field col s4">
                <label>Posto/Grad.</label>
                {{$comissaria->postoGrad}}
              </div>

              <div class="input-field col s5">
                <label for="nomeGuerra">Nome de Guerra</label>
                {{$comissaria->nomeGuerra}}
              </div>

              <div class="input-field col s3">
                <label for="unidade">Unidade</label>
                {{$comissaria->unidade}}
              </div>
           </div>

               <div class="row">
                 <div class="input-field col s3">
                    {{$comissaria->procedencia}}
                   <label for="procedencia">Procedência</label>
                 </div>

                 <div class="input-field col s3">
                    {{$comissaria->destino}}
                   <label for="destino">Destino</label>
                 </div>

                 <div class="input-field col s3">
                    {{$comissaria->matViatura}}
                   <label for="matViatura">Matrícula da Viatura</label>
                 </div>

                 <div class="input-field col s3">
                    {{$comissaria->os}}
                   <label for="os">Ordem de Missão</label>
                 </div>

                </div>

                <div class="row">
                  <div class="input-field col s3">
                    <label for="prevEntrega">Prev. Chegada dos Pedidos</label>
                       {{$comissaria->prevEntrega}}
                  </div>

                  <div class="input-field col s3">
                    <label for="hora">Hora</label>
                       {{$comissaria->hora}}
                  </div>

                  <div class="input-field col s6">
                    <label for="hora">Duração da Missão</label>
                       {{$comissaria->duraMissao}}
                  </div>
                </div>

          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">add_shopping_cart</i>Solicitação</div>
          <div class="collapsible-body">

            <div class="row" style="margin-top: -36px;">
              <div class="input-field col s4">
                <label for="hora">Lanche de Apoio (UN)</label>
                   {{$comissaria->lancheApoio}}
              </div>
              <div class="input-field col s4">
                <label for="hora">Guardanapo (PCT)</label>
                   {{$comissaria->guardanapo}}
              </div>
              <div class="input-field col s4">
                <label for="hora">Água Mineral 1,5L (UN)</label>
                   {{$comissaria->aguaMineral}}
              </div>
        </div>

        <div class="row" style="margin-top: -36px;">
          <div class="input-field col s4">
            <label for="hora">Copo descartável para agua (UN)</label>
               {{$comissaria->copoDescAgua}}
          </div>
          <div class="input-field col s4">
            <label for="hora">Copo descartável para café (UN)</label>
               {{$comissaria->copoDescCafe}}
          </div>
          <div class="input-field col s4">
            <label for="hora">Café (Litros)</label>
               {{$comissaria->cafe}}
          </div>
      </div>

      <div class="row" style="margin-top: -36px;">
        <div class="input-field col s4">
          <label for="hora">Gelo (Kg)</label>
             {{$comissaria->gelo}}
        </div>
        <div class="input-field col s4">
          <label for="hora">Outros</label>
             {{$comissaria->outros}}
        </div>
      </div>

          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Militares Envolvidos</div>
          <div class="collapsible-body">
            <label>Número de envolvidos: {{$total}}</label>
            <table>
                  <thead>
                    <tr>
                      <th>Posto/Grad</th>
                      <th>Nome</th>
                      <th>OM</th>
                    </tr>
                  </thead>

                  <tbody>
            @foreach ($envolvidos as $militars)
              <tr>
                <td>{{$militars->postoG}}</td>
                <td>{{$militars->nomeCompleto}}</td>
                <td>{{$militars->om}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

          </div>
        </li>
      </ul>

      {!! Form::model($comissaria,
         ['route' => ['requisicao.update', 'comissaria' => $comissaria->id],
         'class' => 'form',
         'method' => 'PUT']) !!}

      <div class="col s2">
        <h5>Atendimento:</h5>
      </div>
      <div class="col s2" style="margin-top: 14px;">
        {!! Form::radio('atendimento', 'ok', null, ['id'=>'atendimentoS']) !!}
        <label for="atendimentoS">Atender</label>
      </div>
      <div class="col s2" style="margin-top: 14px;">
        {!! Form::radio('atendimento', 'not', null, ['id'=>'atendimentoN']) !!}
        <label for="atendimentoN">Recusar</label>
      </div>

      <div class="row">
        <div class="col s5 offset-s5">
          <button id="envia" class="btn waves-effect waves-light" type="submit" name="envia">Enviar
          <i class="material-icons left">flight_takeoff</i>
          </button>
        </div>
      </div>

          {!! Form::close() !!}

      </div>
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
