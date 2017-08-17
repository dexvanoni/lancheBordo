
@extends('layout')

@section('titulo')
  COMISSARIA - Criando Requisição
@endsection

@section('topo')
  COMISSARIA - Requisição
@endsection


@section('conteudo')
  {!! Form::open(array('route' => 'requisicao.store', 'method' => 'POST', 'name'=>'form1', 'id'=>'form1')) !!}
  {!! csrf_field() !!}
<div class="container">

  <div style="margin-bottom: 5px; margin-top: 10px;" class="row">
    <div class="col s2">
      <img style="margin-left: 80px" src="/imagens/brasao.png" height="100em" width="90em" />
    </div>
    <div class="col s7">
      <center>
        <h5>COMANDO DA AERONÁUTICA</h5>
        <h6>GRUPAMENTO DE APOIO DE CAMPO GRANDE</h6>
        <h6>SUBDIVISÃO DE INTENDÊNCIA DA DIVISÃO ADMINISTRATIVA</h6>
        <h6>SEÇÃO DE SUBSISTÊNCIA</h6>
      </center>
    </div>
    <div style="margin-top: 30px;" class="col s3">

    <h6>Data </h6><input type="text" name="data" value="{{ date('d/m/Y') }}" readonly>
    </div>
  </div>

<div style="margin-top: 80px" class="row">
  <div class="col s11">
    <blockquote>
      Preencha o formulário de cada aba abaixo e clique em enviar!<br>
      Na aba "Militares envolvidos" digite o posto/graduação e nome completo dos militares participantes da missão. Caso haja mais militares clique no botão <a class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a> para adicionar nomes a sua relação.
    </blockquote>
  </div>
</div>

<ul class="collapsible" data-collapsible="accordion">
  <li>
    <div class="collapsible-header"><i class="material-icons">airplanemode_active</i>Dados da Missão</div>
    <div class="collapsible-body">

      <div class="row">
        <div class="input-field col s4">
           {!! Form::text('postoGrad', null, ['id'=>'postoGrad', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="postoGrad">Posto/Grad.</label>
        </div>

        <div class="input-field col s5">
           {!! Form::text('nomeGuerra', null, ['id'=>'nomeGuerra', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="nomeGuerra">Nome de Guerra</label>
        </div>

        <div class="input-field col s3">
           {!! Form::text('unidade', null, ['id'=>'unidade', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="unidade">Unidade</label>
        </div>
     </div>

         <div class="row">
           <div class="input-field col s3">
              {!! Form::text('procedencia', null, ['id'=>'procedencia', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
             <label for="procedencia">Procedência</label>
           </div>

           <div class="input-field col s3">
              {!! Form::text('destino', null, ['id'=>'destino', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
             <label for="destino">Destino</label>
           </div>

           <div class="input-field col s3">
              {!! Form::text('matViatura', null, ['id'=>'matViatura', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
             <label for="matViatura">Matrícula da Viatura (se houver)</label>
           </div>

           <div class="input-field col s3">
              {!! Form::text('os', null, ['id'=>'os', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
             <label for="os">Ordem de Missão</label>
           </div>

          </div>

          <div class="row">
            <div class="input-field col s3">
              <label for="prevEntrega">Previsão de Chegada dos Pedidos</label>
                 <input type="text" class="datepicker" name="prevEntrega">
            </div>

            <div class="input-field col s3">
              <label for="hora">Hora</label>
                 <input type="text" class="timepicker" name="hora">
            </div>

            <div class="col s2" style="margin-top: 10px;">
              <h6>DURAÇÃO DA MISSÃO</h6>
            </div>
            <div class="col s2" style="margin-top: 10px;">
              {!! Form::radio('duraMissao', 'Inferior a 4h', null, ['id'=>'duraMissao-4']) !!}
              <label for="duraMissao-4">Inferior a 4h</label>
            </div>
            <div class="col s2" style="margin-top: 10px;">
              {!! Form::radio('duraMissao', 'Entre 4h e 8h', null, ['id'=>'duraMissao+4']) !!}
              <label for="duraMissao+4">Entre 4h e 8h</label>
            </div>

           </div>

    </div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">add_shopping_cart</i>Solicitação</div>
    <div class="collapsible-body">

      <div class="row" style="margin-top: -36px;">
        <div class="col s4">
          Lanche de apoio
          <div class="input-field inline">
          {!! Form::text('lancheApoio', null, ['id'=>'lancheApoio', 'class'=>'validate']) !!}
          <label for="lancheApoio" data-error="wrong" data-success="right">UN</label>
        </div>
      </div>
      <div class="col s4">
        Guardanapo
        <div class="input-field inline">
        {!! Form::text('guardanapo', null, ['id'=>'guardanapo', 'class'=>'validate']) !!}
        <label for="guardanapo" data-error="wrong" data-success="right">PCT</label>
        </div>
      </div>
    <div class="col s4">
      Água Mineral
      <div class="input-field inline">
      {!! Form::text('aguaMineral', null, ['id'=>'aguaMineral', 'class'=>'validate']) !!}
      <label for="aguaMineral" data-error="wrong" data-success="right">(1,5L) UN</label>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top: -36px;">
    <div class="col s4">
      Copo descartável para água
      <div class="input-field inline">
      {!! Form::text('copoDescAgua', null, ['id'=>'copoDescAgua', 'class'=>'validate']) !!}
      <label for="copoDescAgua" data-error="wrong" data-success="right">UN</label>
    </div>
  </div>
  <div class="col s4">
    Copo descartável para café
    <div class="input-field inline">
    {!! Form::text('copoDescCafe', null, ['id'=>'copoDescCafe', 'class'=>'validate']) !!}
    <label for="copoDescCafe" data-error="wrong" data-success="right">UN</label>
    </div>
  </div>
<div class="col s4">
  Café
  <div class="input-field inline">
  {!! Form::text('cafe', null, ['id'=>'cafe', 'class'=>'validate']) !!}
  <label for="cafe" data-error="wrong" data-success="right">Litros</label>
  </div>
</div>
</div>

<div class="row" style="margin-top: -36px;">
<div class="col s4">
  Gelo
  <div class="input-field inline">
  {!! Form::text('gelo', null, ['id'=>'gelo', 'class'=>'validate']) !!}
  <label for="gelo" data-error="wrong" data-success="right">KG</label>
</div>
</div>
<div class="col s8">
Outros
<div class="input-field inline">
{!! Form::text('outros', null, ['id'=>'outros', 'size'=>'80', 'class'=>'validate']) !!}
<label for="outros" data-error="wrong" data-success="right"></label>
</div>
</div>
</div>

    </div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Militares Envolvidos</div>
    <div class="collapsible-body">

      <div class="row">
          <div class="col offset-s10">
            <a class="btn-floating tooltipped btn-large waves-effect waves-light red" id="btAdd" aria-label="addCampo" data-tooltip="Adicionar militar na lista" onclick="addCampos()"><i class="material-icons">add</i></a>
          </div>
      </div>

      <div class="row">
        <div id="camposAdd">

            <div class="input-field col s2">
              {!! Form::text('tr[0][postoG]', null, ['id'=>'tr[0][postoG]', 'class'=>'validate']) !!}
              <label for="tr[0][postoG]" data-error="wrong" data-success="right">Posto/Grad.</label>
            </div>

            <div class="input-field col s6">
              {!! Form::text('tr[0][nomeCompleto]', null, ['id'=>'tr[0][nomeCompleto]', 'class'=>'validate']) !!}
              <label for="tr[0][nomeCompleto]" data-error="wrong" data-success="right">Nome Completo</label>
            </div>

            <div class="input-field col s2">
              {!! Form::text('tr[0][om]', null, ['id'=>'tr[0][om]', 'class'=>'validate']) !!}
              <label for="tr[0][om]" data-error="wrong" data-success="right">OM</label>
            </div>

        </div>
      </div>
        <div id="campoPai"></div>
    </div>
  </li>
</ul>
{!! Form::hidden('atendimento', 'new') !!}

<div class="row">
  <div class="col s5 offset-s5">
    <button class="btn waves-effect waves-light" type="submit" name="button">Enviar
    <i class="material-icons left">flight_takeoff</i>
    </button>
  </div>
</div>

    <script type="text/javascript">
      var qtdeCampos = 1;
        function addCampos() {
        var objPai = document.getElementById("campoPai");
        var x = document.getElementById("camposAdd").innerHTML;
        //Criando o elemento DIV;
        var objFilho = document.createElement("div");
        //Definindo atributos ao objFilho:
        objFilho.setAttribute("id","militars"+qtdeCampos);
        //Inserindo o elemento no pai:
        objPai.appendChild(objFilho);
        //Escrevendo algo no filho recém-criado:
        document.getElementById("militars"+qtdeCampos).innerHTML = "<div id='camposAdd' style='margin-top: -20px;'><div class='row'><div class='input-field col s2'><input type='text' name='tr["+qtdeCampos+"][postoG]' id='tr["+qtdeCampos+"][postoG]' class='validate'><label for='tr["+qtdeCampos+"][postoG]' data-error='wrong' data-success='right'>Posto/Grad.</label></div><div class='input-field col s6'><input type='text' name='tr["+qtdeCampos+"][nomeCompleto]' id='tr["+qtdeCampos+"][nomeCompleto]' class='validate'><label for='tr["+qtdeCampos+"][nomeCompleto]' data-error='wrong' data-success='right'>Nome Completo</label></div><div class='input-field col s2'><input type='text' name='tr["+qtdeCampos+"][om]' id='tr["+qtdeCampos+"][om]' class='validate'><label for='tr["+qtdeCampos+"][om]' data-error='wrong' data-success='right'>OM</label></div><div class='col s2'><a class='btn-floating tooltipped waves-effect waves-light' id='btAdd' data-tooltip='Remover militar da lista' aria-label='addCampo' onclick='removerCampo("+qtdeCampos+")'><i class='material-icons'>highlight_off</i></a></div></div></div>";
        qtdeCampos++;
        //$('#qtdeCampos').val(qtdeCampos);
      }
      function removerCampo(id) {
      var objPai = document.getElementById("campoPai");
      var objFilho = document.getElementById("militars"+id);
      //Removendo o DIV com id específico do nó-pai:
      var removido = objPai.removeChild(objFilho);
      }
    </script>
</div><!--container-->
    {!! Form::close() !!}
@endsection
