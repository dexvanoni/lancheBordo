
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
<br><br>
{!! Form::open(array('route' => 'requisicao.store', 'method' => 'POST', 'name'=>'form1', 'id'=>'form1')) !!}
   {!! csrf_field() !!}
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

    {!! Form::close() !!}

</div><!--container-->

@endsection
