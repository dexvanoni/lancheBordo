
@extends('layout')

@section('titulo')
  COMISSARIA - Oficiais Autenticadores
@endsection

@section('topo')
  COMISSARIA - Oficiais Autenticadores
@endsection


@section('conteudo')
  {!! Form::open(array('route' => 'autenticadores.store', 'method' => 'POST', 'name'=>'form1', 'id'=>'form1')) !!}
  {!! csrf_field() !!}
<div class="container">
<br>
<div class="row">
  <div class="col s11">
    <blockquote>
      O cadastro é realizado somente de oficiais!
      Atenção ao digitar o SARAM. O oficial realizará a autenticação através do SARAM ao logar no sistema!
    </blockquote>
  </div>
</div>

<br>
<div class="row">
  <div class="input-field col s2">
     {!! Form::text('saram', null, ['id'=>'saram', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
    <label for="postoGrad">SARAM</label>
  </div>

  <div class="input-field col s3">
    <select name="posto">
      <option value="" disabled selected>Escolha um Posto </option>
      <option value="TB">TB</option>
      <option value="MB">MB</option>
      <option value="BR">BR</option>
      <option value="CL">CL</option>
      <option value="TC">TC</option>
      <option value="MJ">MJ</option>
      <option value="CP">CP</option>
      <option value="1T">1T</option>
      <option value="2T">2T</option>
      <option value="AP">AP</option>
    </select>
    <label>Posto</label>
  </div>

  <div class="input-field col s6">
     {!! Form::text('nome', null, ['id'=>'nome', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
    <label for="unidade">Nome Completo</label>
  </div>

</div>

<div class="row">
  <div class="input-field col s2">
     {!! Form::text('contato', null, ['id'=>'contato', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
    <label for="unidade">Contato</label>
  </div>

  <div class="input-field col s3">
     {!! Form::text('esquadrao', null, ['id'=>'esquadrao', 'size' => '6', 'width' => '10', 'class'=>'validate']) !!}
    <label for="unidade">Esquadrão</label>
  </div>
</div>

<div class="row">
  <div class="col s5 offset-s5">
    <button class="btn waves-effect waves-light" type="submit" name="button">Enviar
    <i class="material-icons left">flight_takeoff</i>
    </button>
  </div>
</div>
</div><!--container-->

    {!! Form::close() !!}
@endsection
