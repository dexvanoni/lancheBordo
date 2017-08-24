<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <!--<link type="text/css" rel="stylesheet" href="/materialize/css/icons.css"  media="screen,projection"/>-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <!--<link type="text/css" rel="stylesheet" href="/materialize/css/materialize.min.css"/>-->

    <link rel="stylesheet" href="/materialize/css/ghpages-materialize.css" media="screen,projection">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet" media="screen,projection">

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style media="screen">
    html, body {height:100%;}
    .page-footer {
      position:absolute;
    bottom:0;
    width:100%;
  }
    </style>
  </head>
  <body>
    <?php $tela = ''; ?>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="{{ route('requisicao.index')}}">Ver Requisições</a></li>
      <li><a href="{{ route('requisicao.create')}}">Fazer nova Requisição</a></li>
    </ul>
    <nav>
       <div class="nav-wrapper">
         <a style="margin-left: 2em" href="/" class="brand-logo">@yield('topo')</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Requisições<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
       </div>
     </nav>


@yield('conteudo')


<div class="fixed-action-btn horizontal">
  <a class="btn-floating btn-large blue">
    <i class="material-icons">menu</i>
  </a>
  <ul>
    <li><a href="http://10.152.16.203/eti" target="_blank" class="btn-floating tooltipped red" data-position="top" data-delay="50" data-tooltip="Página ATIC-CG"><i class="material-icons">airplanemode_active</i></a></li>
    <li><a href="http://10.152.16.203/glpi" target="_blank" class="btn-floating tooltipped yellow darken-1" data-position="top" data-delay="50" data-tooltip="HelpDesk TI"><i class="material-icons">library_books</i></a></li>
    <li><a href="http://www.gapcg.intraer/gapcg/index.php/chefe" target="_blank" class="btn-floating tooltipped green" data-position="top" data-delay="50" data-tooltip="Conheça o Chefe do GAP-CG"><i class="material-icons">person_pin</i></a></li>
    <li><a href="http://servicos.sti.intraer/portal/consumer_email" target="_blank" class="btn-floating tooltipped blue" data-position="top" data-delay="50" data-tooltip="Webmail"><i class="material-icons">email</i></a></li>
  </ul>
</div>

<script type="text/javascript" src="/js/jquery-1.12.4.js"></script>
<script src="/materialize/js/materialize.js"></script>
<script src="/materialize/js/materialize.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.material.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){

        $("#envia").hide();
        $(".dropdown-button").dropdown();
        $('.tooltipped').tooltip({delay: 50});
         $(".button-collapse").sideNav();
         $('.collapsible').collapsible();
         $('#pesquisa').DataTable();
          $('select').material_select();
       $("#atendimentoS").click(function(){
         if($(this).prop('checked')){
           $("#envia").show();
         }});
         $("#atendimentoN").click(function(){
           if($(this).prop('checked')){
             $("#envia").show();
           }});
         });
  </script>
  <script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true,//Creates a dropdown to control month
    selectYears: 15,//Creates a dropdown of 15 years to control year
    //The title label to use for the month nav buttons
    labelMonthNext: 'Proximo Mês',
    labelMonthPrev: 'Mês Anterior',
    //The title label to use for the dropdown selectors
    labelMonthSelect: 'Selecionar Mês',
    labelYearSelect: 'Selecionar Ano',
    //Months and weekdays
    monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
    monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
    weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
    weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' ],
    //Materialize modified
    weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
    //Today and clear
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Fechar',
    //The format to show on the `input` element
    format: 'dd/mm/yyyy'
  });
  $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });

  </script>
@yield('rodape')
  </body>
</html>
