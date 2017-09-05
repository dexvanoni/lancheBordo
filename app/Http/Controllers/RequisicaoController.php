<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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

        $comissaria = Comissaria::orderBy('id')->paginate(50000);
        return view('requisicao.index',compact('comissaria'));

      }

      public function show($id){

        $comissaria = Comissaria::find($id);
        $envolvidos = Comissaria::find($id)->militares;
        $total = $envolvidos->count();
        $tela = 'adm';
        $admin = 'admin';
        return view('requisicao.show', compact('comissaria', 'envolvidos', 'total', 'tela', 'admin'));
      }

      public function update(Request $request, $id){
        $comissaria = Comissaria::find($id);
        $comissaria->atendimento = $request->input('atendimento');
        $comissaria->save();

        Session::flash('mensagem_edit', "Requisição Atendida!");
        return redirect()->route('volta');
      }

      public function relatorios(){
        $tela = 'adm';
        $admin = 'admin';

        $ano = date('Y');
        $comissaria = Comissaria::where('atendimento', '=', 'ok')->whereYear('updated_at', $ano);;
        $comissaria2 = Comissaria::where('atendimento', '=', 'not')->whereYear('updated_at', $ano);;
        $total = $comissaria->count();
        $total2 = $comissaria2->count();
        return view('requisicao.relatorios', compact('ano', 'comissaria', 'tela', 'admin', 'total', 'total2'));
      }

      public function pesquisa(Request $request){
        $tela = 'adm';
        $admin = 'admin';

        $ano = date('Y');

        $comissaria = Comissaria::where('atendimento', '=', 'ok')->whereYear('updated_at', $ano);
        $comissaria2 = Comissaria::where('atendimento', '=', 'not')->whereYear('updated_at', $ano);;
        $total = $comissaria->count();
        $total2 = $comissaria2->count();

        $de = $request->get('de');
        $ate = $request->get('ate');

        //$rela = DB::table('comissarias')->whereBetween('updated_at', [$de, $ate])->where('atendimento', '=', 'ok')->get();
        $qtn = Comissaria::withCount('militares')->whereBetween('updated_at', [$de, $ate])->where('atendimento', '=', 'ok')->orderBy('id', 'DESC')->get();
        $tot = $qtn->count();
        return view('requisicao.relatorios', compact('ano', 'de', 'ate', 'qtn', 'comissaria', 'tela', 'admin', 'total', 'total2', 'tot'));
      }


      public function avisos(){
        return view('avisos');
      }

}
