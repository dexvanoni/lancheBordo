<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Comissaria;
use App\Militar;
use App\AdmRancho;
use Response;
use App\Of;

class OficiaisController extends Controller
{

  private $comissaria;
  private $militar;
  private $adm_rancho;
  private $oficiais;

  public function __construct(Of $oficiais, Comissaria $comissaria, Militar $militar, AdmRancho $adm_rancho)
  {
    $this->comissaria = $comissaria;
    $this->militar = $militar;
    $this->adm_rancho = $adm_rancho;
    $this->oficiais = $oficiais;
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

        $comissaria = Comissaria::orderBy('id')->paginate(50000);
        return view('adm.oficiais.index',compact('comissaria'));

      }

      public function show($id){

        $comissaria = Comissaria::find($id);
        $envolvidos = Comissaria::find($id)->militares;
        $total = $envolvidos->count();
        $tela = 'adm';
        $admin = 'admin';
        return view('adm.oficiais.show', compact('comissaria', 'envolvidos', 'total', 'tela', 'admin'));
      }

      public function update(Request $request, $id){
        $comissaria = Comissaria::find($id);
        $comissaria->autoriza = $request->input('autoriza');
        $comissaria->saram_aut = $request->input('saram_aut');
        $comissaria->nome_aut = $request->input('nome_aut');
        $comissaria->save();

        Session::flash('mensagem_edit', "Requisição Autorizada!");
        return redirect()->action('OficiaisController@index');
        //return redirect()->route('oficiais.index');
      }

}
