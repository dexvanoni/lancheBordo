<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login', function(){
  return view('login');
});

Route::get('/volta', array(
  'as' => 'volta',
  'uses' => 'LoginAdmController@voltar'
));

Route::get('/volta2', array(
  'as' => 'volta2',
  'uses' => 'LoginController@voltar2'
));

Route::post('/', 'LoginAdmController@login');

Route::get('/log', function () {
    return view('adm.oficiais.login');
});

Route::post('/log', 'LoginController@doLogin');

Route::get('/account/sign-out', array(
  'as' => 'account-sign-out',
  'uses' => 'LoginController@getSignOut'
));

Route::post('/relatorio', 'RequisicaoController@pesquisa');

Route::resource('requisicao', 'RequisicaoController');
Route::resource('oficiais', 'OficiaisController');

Route::get('/relatorios', array(
  'as' => 'relatorios',
  'uses' => 'RequisicaoController@relatorios'
));
