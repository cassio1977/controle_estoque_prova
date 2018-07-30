<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estoque;
use App\Produto;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    //
    public function movimentar($id,$tipo)
    {
      $registro = Produto::find($id);
      //soma as entradas
      $total = DB::table('estoques')
                ->select( DB::raw('SUM(quantidade) as te'))
                ->where([
                          ['sku', '=', $id],
                          ['tipo', '=', 'e'],
                      ])
                -> get()
                ;

      //soma as saídas
      $total2= DB::table('estoques')
                ->select( DB::raw('SUM(quantidade) as ts'))
                ->groupBy('SKU')
                ->where([
                          ['sku', '=', $id],
                          ['tipo', '=', 's'],
                      ])
                -> get()
                ;

                $total_1=0;
                foreach($total as $reg){
                    $total_1 = $total_1+ $reg->te;
                }
                $total_2=0;
                foreach($total2 as $reg){
                    $total_2 = $total_2+ $reg->ts;
                }

  $estoque = $total_1-$total_2;
      return view('admin.estoque.estoque',compact('registro','tipo','estoque'));
      //return view('admin.estoque.teste',compact('estoque'));
    }
    public function salvar(Request $req)
    {
      $dados = $req->all();
      //dd($dados);
      if(isset($dados['Tipoe'])){
        $dados['tipo'] = 'e';
      }

    if(isset($dados['Tipos'])){
        $dados['tipo'] = 's';
      }

      if(isset($dados['api'])){
        $dados['api'] = 's';
      }else{
        $dados['api'] = 'n';
      }

      Estoque::create($dados);

      return redirect()->route('admin.produtos');

    }

    public function relatorio()
    {
      return view('admin.estoque.relatorio');
    }
    public function relatoriop(Request $req)
    {
      $dados = $req->all();
      //dd($dados);
      if($dados['dtini']==""){
        $mes = date('m');
        $ano= date('Y');
        $dados['dtini']= "$ano-$mes-01";
      }
      if($dados['dtfim']==""){
        $mes = date('m');
        $ano= date('Y');
        if($mes=='04' or $mes=='06' or $mes=='09' or $mes=='11'  ){
          $dia=30;
        }else{
          $dia=31;
        }
        if($mes=='02'){
          $dia=29;
        }
        $dados['dtfim']= "$ano-$mes-$dia";
      }

      if(isset($dados['api'])){
        $api = 's';
      } else {
        $api='n';
      }
      if($dados['sku']<>""){
        $registros=DB::table('estoques')
                  ->where([
                            ['data', '>=', $dados['dtini']],
                            ['data', '<=', $dados['dtfim']],
                            ['api', '=', $api],
                            ['sku', '=', $dados['sku']],
                        ])
                  -> get()
                  ;
      } else{
        $registros=DB::table('estoques')
                  ->where([
                            ['data', '>=', $dados['dtini']],
                            ['data', '<=', $dados['dtfim']],
                            ['api', '=', $api],
                        ])
                  -> get()
                  ;

      }
      return view('admin.estoque.relatorio',compact('registros','dados'));
    }
    public function get_all()
    {
      $dados = Estoque::all();
      return $dados;
    }

    public function adicionare(Request $req)
    {
      $estoque=Estoque::create($req->all());
      return $estoque;
    }
    public function baixare(Request $req)
    {
      $dados = $req->all();
      $saldo=$this->retorna_estoque($dados['sku']);
      if($dados['quantidade']<=$saldo && $dados['quantidade']>=0){
      $estoque=Estoque::create($req->all());
      return $estoque;
    } else {
      return "Não executado, seu estoque é: ".$saldo. " e você tentou movimentar: ".$dados['quantidade'];
    }
    }
    public static function retorna_estoque($id){
      $total = DB::table('estoques')
                ->select( DB::raw('SUM(quantidade) as te'))
                ->where([
                          ['sku', '=', $id],
                          ['tipo', '=', 'e'],
                      ])
                -> get()
                ;

      //soma as saídas
      $total2= DB::table('estoques')
                ->select( DB::raw('SUM(quantidade) as ts'))
                ->groupBy('SKU')
                ->where([
                          ['sku', '=', $id],
                          ['tipo', '=', 's'],
                      ])
                -> get()
                ;

                $total_1=0;
                foreach($total as $reg){
                    $total_1 = $total_1+ $reg->te;
                }
                $total_2=0;
                foreach($total2 as $reg){
                    $total_2 = $total_2+ $reg->ts;
                }

  $estoque = $total_1-$total_2;
  return $estoque;
    }
}
