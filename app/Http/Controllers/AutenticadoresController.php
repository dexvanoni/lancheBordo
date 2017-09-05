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
use App\User;

class AutenticadoresController extends Controller
{
  private $comissaria;
  private $militar;
  private $adm_rancho;
  private $oficiais;
  private $autenticadores;

  public function __construct(Of $autenticadores, Of $oficiais, Comissaria $comissaria, Militar $militar, AdmRancho $adm_rancho)
  {
    $this->comissaria = $comissaria;
    $this->militar = $militar;
    $this->adm_rancho = $adm_rancho;
    $this->oficiais = $oficiais;
    $this->autenticadores = $autenticadores;
  }

  public function index()
    {

      $autenticadores = Of::orderBy('id')->paginate(50000);
      return view('autenticadores.index',compact('autenticadores'));

    }

    public function create(){
      $autenticadores = $this->autenticadores->all();
      return view('autenticadores.create', compact('autenticadores'));
    }

    public function store(Request $request){

      $postos = array("AP", "2T", "1T", "CP", "MJ", "TC", "CL", "BR", "MB", "TB");

      $usuario = User::where('pescodigo', '=', $request->get('saram'))->first();

      if ($usuario == NULL) {
        Session::flash('mensagem_create', 'Militar não foi cadastrado! SARAM não existe.');
        return redirect()->action('AutenticadoresController@index');
      }

      $posto = DB::table('tb_posto_graduacao')
      ->select('pgabrev')
      ->where('pgid', '=', $usuario->pespostograd)
      ->get();
      $posto = $posto[0]->pgabrev;

      $repetir = DB::table('ofs')
      ->select('saram')
      ->where('saram', '=', $request->saram)
      ->first();
      
      if (in_array($request->posto, $postos) AND (isset($usuario)) AND ($request->posto == $posto) AND (empty($repetir))) {
        $autenticadores = Of::create($request->all());
        Session::flash('mensagem_create', 'Novo autenticador adicionado.');
        return redirect()->action('AutenticadoresController@index');
      } else {
        if ($request->posto != $posto) {
          Session::flash('mensagem_create', 'Militar não foi cadastrado! Posto não confere com SARAM.');
          return redirect()->action('AutenticadoresController@index');
        }
        if ($usuario == NULL) {
          Session::flash('mensagem_create', 'Militar não foi cadastrado! SARAM não existe.');
          return redirect()->action('AutenticadoresController@index');
        }
        if ($repetir) {
          Session::flash('mensagem_create', 'Militar já estava cadastrado!');
          return redirect()->action('AutenticadoresController@index');
        }
        Session::flash('mensagem_create', 'Militar não foi cadastrado! ');
        return redirect()->action('AutenticadoresController@index');
      }

    }

    public function show($id){

      $autenticadores = Of::find($id);
      return view('autenticadores.show', compact('autenticadores'));
    }

    public function edit($id){

      $autenticadores = Of::find($id);
      return view('autenticadores.edit', compact('autenticadores'));

    }

    public function update(Request $request, $id){
      $autenticadores = Of::find($id);
      $data = $request->all();
      $autenticadores->fill($data)->save();

      Session::flash('mensagem_edit', "Cadastro de autenticador atualizado!");
      return redirect()->action('AutenticadoresController@index');
    }

    public function destroy($id){
      $autenticadores = Of::find($id);
      $autenticadores->delete();
      Session::flash('mensagem_del', "Autenticador deletado com Sucesso!");
      return redirect()->action('AutenticadoresController@index');
    }

}
