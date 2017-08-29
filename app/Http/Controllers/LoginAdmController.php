<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdmRancho;
use App\Comissaria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginAdmController extends Controller
{
  public function login(Request $request){

  $usuario = AdmRancho::where('login', '=', $request->get('login'))->first();
  $senha = AdmRancho::where('senha', '=', $request->get('password'))->first();

    if( $usuario && $senha) {
      Session::put('admin', $usuario->nome);
      //$comissaria = Comissaria::where('atendimento', '=', 'new')->paginate(50000);
      $comissaria = DB::table('comissarias')
                ->orderBy('created_at', 'desc')
                ->get();
      $tela = 'adm';
      $admin = 'admin';
      return view('adm.administracao', compact('usuario', 'comissaria', 'tela', 'admin'));

      } else {

      Session::flash('msgLogin', 'Erro! Tente Novamente.');
      return view('login');
    }

  }

  public function voltar(){

    //$comissaria = Comissaria::where('atendimento', '=', 'new')->paginate(50000);
    $comissaria = DB::table('comissarias')->orderBy('created_at', 'DESC')->get();
    $tela = 'adm';
    $admin = 'admin';
    return view('adm.administracao', compact('comissaria', 'tela', 'admin'));
  }
}
