
@extends('layout')

@section('titulo')
  COMISSARIA - Criando Requisição
@endsection

@section('topo')
  COMISSARIA - Requisição
@endsection


@section('conteudo')

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
    <div style="margin-top: 30px;" class="center col s3">
        <h6>Data: {{ date('d/m/Y') }}</h6>
    </div>
  </div>
<br>
{!! Form::open(array('route' => 'requisicao.store', 'method' => 'POST', 'name'=>'form1', 'id'=>'form1')) !!}
   {!! csrf_field() !!}

   <div class="row">
     <div class="input-field col s4">
        {!! Form::text('postoGrad', null, ['id'=>'postoGrad', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
       <label for="postoGrad">Posto/Grad.</label>
     </div>

     <div class="input-field col s8">
        {!! Form::text('nomeGuerra', null, ['id'=>'nomeGuerra', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
       <label for="nomeGuerra">Nome de Guerra</label>
     </div>
  </div>

      <div class="row">
        <div class="input-field col s4">
           {!! Form::text('unidade', null, ['id'=>'unidade', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="unidade">Unidade</label>
        </div>

        <div class="input-field col s4">
           {!! Form::text('procedencia', null, ['id'=>'procedencia', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="procedencia">Procedência</label>
        </div>

        <div class="input-field col s4">
           {!! Form::text('destino', null, ['id'=>'destino', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
          <label for="destino">Destino</label>
        </div>

       </div>

       <div class="row">
         <div class="input-field col s3">
            {!! Form::text('matViatura', null, ['id'=>'matViatura', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
           <label for="matViatura">Matrícula da Viatura (se houver)</label>
         </div>

         <div class="input-field col s3">
            {!! Form::text('os', null, ['id'=>'os', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
           <label for="os">Ordem de Missão</label>
         </div>

         <div class="input-field col s3">
           <label for="prevEntrega">Previsão de Chegada dos Pedidos</label>
              <input type="text" class="datepicker" name="prevEntrega">
         </div>

         <div class="input-field col s3">
           <label for="hora">Hora</label>
              <input type="text" class="timepicker" name="hora">
         </div>

        </div>

        <div class="row">
          <div class="col s2">
            <h6>DURAÇÃO DA MISSÃO</h6>
          </div>
          <div class="col s2">
            {!! Form::radio('duraMissao', 'Inferior a 4h', null, ['id'=>'duraMissao-4']) !!}
            <label for="duraMissao-4">Inferior a 4h</label>
          </div>
          <div class="col s2">
            {!! Form::radio('duraMissao', 'Entre 4h e 8h', null, ['id'=>'duraMissao+4']) !!}
            <label for="duraMissao+4">Entre 4h e 8h</label>
          </div>
        </div>

        <div class="row">
          <div class="col s6 offset-s5">
            <h6>SOLICITAÇÃO</h6>
          </div>
        </div>

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

<div class="row">
  <div class="col s6 offset-s5">
    <h6>Militares envolvidos na missão</h6>
  </div>
  <div class="col s6">
    <div class="pull-right">
      <a class="btn-floating btn-large waves-effect waves-light red" id="btAdd" aria-label="addCampo" onclick="addCampos()"><i class="material-icons">add</i></a>
    </div>
  </div>
</div>

<div class="row">
  <div id="camposAdd">

      <div class="input-field col s2 offset-s2">
        {!! Form::text('postoGrad', null, ['id'=>'postoGrad', 'class'=>'validate']) !!}
        <label for="postoGrad" data-error="wrong" data-success="right">Posto/Grad.</label>
      </div>

      <div class="input-field col s6">
        {!! Form::text('nomeCompleto', null, ['id'=>'nomeCompleto', 'class'=>'validate']) !!}
        <label for="nomeCompleto" data-error="wrong" data-success="right">Nome Completo</label>
      </div>

  </div>

  <div id="campoPai"></div>

</div>

    {!! Form::close() !!}

</div><!--container-->

@endsection
