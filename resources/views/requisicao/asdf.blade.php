<div id='camposAdd' style='margin-top: -20px;'>
  <div class='row'>
    <div class='input-field col s2'>
      <input type='text' name='tr["+qtdeCampos+"][postoGrad]' id='tr["+qtdeCampos+"][postoGrad]' class='validate'>
      <label for='tr["+qtdeCampos+"][postoGrad]' data-error='wrong' data-success='right'>Posto/Grad.</label>
    </div>
    <div class='input-field col s6'>
      <input type='text' name='tr["+qtdeCampos+"][nomeCompleto]' id='tr["+qtdeCampos+"][nomeCompleto]' class='validate'>
      <label for='tr["+qtdeCampos+"][nomeCompleto]' data-error='wrong' data-success='right'>Nome Completo</label>
    </div>
    <div class='input-field col s2'>
      <input type='text' name='tr["+qtdeCampos+"][om]' id='tr["+qtdeCampos+"][om]' class='validate'>
      <label for='tr["+qtdeCampos+"][om]' data-error='wrong' data-success='right'>OM</label>
    </div>
    <div class='col s2'>
      <a class='btn-floating tooltipped waves-effect waves-light' id='btAdd' data-tooltip='Remover militar da lista' aria-label='addCampo' onclick='removerCampo("+qtdeCampos+")'>
        <i class='material-icons'>highlight_off</i>
      </a>
    </div>
  </div>
</div>


<td style="width: 15%" >
  <ul class="list-inline list-small">
    <li title="Excluir">
      <form action="{{ route('requisicao.destroy', ['comissarias' => $comissarias->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
      </form>
    </li>
  </ul>
</td>
