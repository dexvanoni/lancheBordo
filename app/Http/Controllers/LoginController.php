<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Militar;
use App\AdmRancho;
use App\Of;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
  public function doLogin(Request $request)
  {
    // verifica se é Adm
    $adm1 = Of::where('saram', '=', $request->get('pescodigo'))->first();
    $adm2='';
    if ($adm1) {
      $adm2 = $adm1->saram;
    } else {
      Session::flash('msgLogin', 'SARAM não existe no Sistema SASIS. Tente novamente!');
      return view('adm.oficiais.login');
    }

    if ($adm2) {
      $administrador='';
      Session::put('administrador', $adm2);
    }
    //--------------------------------------


    $usuario = User::where('pescodigo', '=', $request->get('pescodigo'))->first();
    $senha = User::where('sasis_senha', '=', $request->get('password'))->first();
    $posto = DB::table('tb_posto_graduacao')
    ->select('pgabrev')
    ->where('pgid', '=', $usuario->pespostograd)
    ->get();
    $posto = $posto[0]->pgabrev;

          if( $usuario && $senha && $adm1) {

              $peslogin='';
              Session::put('peslogin', $usuario->peslogin);
              $value = Session::get('peslogin');

              $pesncompleto='';
              Session::put('pesncompleto', $usuario->pesncompleto);
              $nomecompleto = Session::get('pesncompleto');

              $pescodigo='';
              Session::put('pescodigo', $usuario->pescodigo);
              $saram = Session::get('pescodigo');

              $pescpf='';
              Session::put('pescpf', $usuario->pescpf);
              $cpf = Session::get('pescpf');

              $pesbanco='';
              Session::put('pesbanco', $usuario->pesbanco);
              $banco = Session::get('pesbanco');

              $pesdn='';
              Session::put('pesdn', $usuario->pesdn);
              $datadenascimento = Session::get('pesdn');

              $pesemail='';
              Session::put('pesemail', $usuario->pesemail);
              $pemail = Session::get('pesemail');

              $pesidentidade='';
              Session::put('pesidentidade', $usuario->pesidentidade);
              $identidade = Session::get('pesidentidade');

              $pesfonetrabramal='';
              Session::put('pesfonetrabramal', $usuario->pesfonetrabramal);
              $ramal = Session::get('pesfonetrabramal');

              $pesnguerra='';
              Session::put('pesnguerra', $usuario->pesnguerra);
              $guerra = Session::get('pesnguerra');

              $dono='';
              Session::put('dono', $usuario->pescodigo);

              Session::flash('msgLogin', 'Sucesso');

              $comissaria = DB::table('comissarias')
                        ->orderBy('created_at', 'desc')
                        ->get();
              $tela = 'adm';

              return view('adm.oficiais.index', compact('usuario', 'comissaria', 'tela', 'admin', 'posto', 'adm2', 'valor1'));

            } else {

              if ($adm2 == '') {
                Session::flash('msgLogin', 'Erro! Você não é um Autorizador. Tente Novamente.');
              } else {
                Session::flash('msgLogin', 'Erro! Senha incorreta. Tente Novamente.');
              }
                return view('adm.oficiais.login');
            }
          }


          public function back(){

            return redirect()->action('OficiaisController@index');

          }

          public function getSignOut() {
              Session::flush();
              $dono = '';
              return view('/');
            }
          }
