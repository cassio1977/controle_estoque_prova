<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['as'=>'site.home','uses'=>'Site\HomeController@index']);
Route::get('/login',['as'=>'site.login','uses'=>'Site\LoginController@index']);
Route::get('/login/sair',['as'=>'site.login.sair','uses'=>'Site\LoginController@sair']);
Route::post('/login/entrar',['as'=>'site.login.entrar','uses'=>'Site\LoginController@entrar']);

Route::group(['middleware'=>'auth'],function(){
  Route::group(['prefix'=>'admin/produtos/'], function(){
    Route::get('/',['as'=>'admin.produtos', 'uses'=>'Admin\ProdutoController@index']);
    Route::get('adicionar',['as'=>'admin.produtos.adicionar', 'uses'=>'Admin\ProdutoController@adicionar']);
    Route::post('salvar',['as'=>'admin.produtos.salvar', 'uses'=>'Admin\ProdutoController@salvar']);
    Route::get('editar/{sku}',['as'=>'admin.produtos.editar', 'uses'=>'Admin\ProdutoController@editar']);
    Route::get('filtrar/{valor}',['as'=>'admin.produtos.filtrar', 'uses'=>'Admin\ProdutoController@filtrar']);
    Route::put('atualizar/{sku}',['as'=>'admin.produtos.atualizar', 'uses'=>'Admin\ProdutoController@atualizar']);
    Route::get('deletar/{sku}',['as'=>'admin.produtos.deletar', 'uses'=>'Admin\ProdutoController@deletar']);
  });
  Route::group(['prefix'=>'admin/estoque/'], function(){
    Route::get('movimentar/{sku}/{tipo}',['as'=>'admin.estoque.movimentar', 'uses'=>'Admin\EstoqueController@movimentar']);
    Route::post('salvar/{sku}',['as'=>'admin.estoque.salvar', 'uses'=>'Admin\EstoqueController@salvar']);
    Route::get('relatorio',['as'=>'admin.estoque.relatorio', 'uses'=>'Admin\EstoqueController@relatorio']);
    Route::post('relatorio',['as'=>'admin.estoque.relatoriop', 'uses'=>'Admin\EstoqueController@relatoriop']);
  });
});
