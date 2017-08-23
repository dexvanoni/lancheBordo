<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Comissaria;
use App\Militar;
use App\AdmRancho;
use Response;

class RequisicaoController extends Controller
{

  private $comissaria;
  private $militar;
  private $adm_rancho;

  public function __construct(Comissaria $comissaria, Militar $militar, AdmRancho $adm_rancho)
  {
    $this->comissaria = $comissaria;
    $this->militar = $militar;
    $this->adm_rancho = $adm_rancho;
  }

    public function create(){

      $comissaria = $this->comissaria->all();

      return view('requisicao.create', compact('comissaria'));
    }

    public function store(Request $request){

      $comissaria = Comissaria::create($request->all());

      $tr = $request->all();

      foreach($tr['tr'] as $values)
        {
          $comissaria->militares()->create($values);
        }

      Session::flash('mensagem_create', 'Requisição para o Sr. ' .$request->postoGrad. ' ' .$request->nomeGuerra. ' foi adicionada com sucesso!');

      return view('welcome');

    }

    public function index()
      {

        $comissaria = Comissaria::orderBy('id', 'DESC')->paginate(10);
        return view('requisicao.index',compact('comissaria'));

      }

      public function show($id){

        $comissaria = Comissaria::find($id);
        $envolvidos = Comissaria::find($id)->militares;
        $total = $envolvidos->count();
        return view('requisicao.show', compact('comissaria', 'envolvidos', 'total'));
      }

      public function update(Request $request, $id){
        $comissaria = Comissaria::find($id);
        $comissaria->atendimento = $request->input('atendimento');
        $comissaria->save();

        Session::flash('mensagem_edit', "Requisição Atendida!");
        return redirect()->route('volta');
      }



}
