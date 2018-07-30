@extends('layout.site')

@section('titulo','Produtos')

@section('conteudo')

  <div class="container">
    <h3 class="center">Lista de Produtos</h3>
  </div>
    <div class="row" style="margin-left:10px">
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Publicado</th>
            <th>API</th>
            <th>Estoque</th>
            <th style="text-align:center;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
            <tr>
              <td>{{ $registro->sku }}</td>
              <td>{{ $registro->titulo }}</td>
              <td>{{ $registro->descricao }}</td>
              <td><img height="60" src="{{asset($registro->imagem)}}" alt="{{ $registro->titulo }}" /></td>
              <td>{{ $registro->publicado }}</td>
              <td>{{ $registro->api }}</td>
              <td class="verificar" style="text-align:center">{{App\Http\Controllers\Admin\EstoqueController::retorna_estoque($registro->sku)}}</td>
              <td>
                <a class="btn deep-orange" href="{{ route('admin.produtos.editar',$registro->sku) }}">Editar</a>
                <a class="btn red" href="{{ route('admin.produtos.deletar',$registro->sku) }}" onClick="return confirmar();">Deletar</a>
                <a class="btn blue" href="{{ route('admin.estoque.movimentar',[$registro->sku,'e'])}}" alt="Estoque +"><i class="material-icons dp48">local_shipping</i> <i class="material-icons dp48">add_circle</i></a>
                <a class="btn red" href="{{ route('admin.estoque.movimentar',[$registro->sku,'s'])}}" alt="Estoque -"><i class="material-icons dp48">local_shipping</i> <i class="material-icons dp48">do_not_disturb_on</i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <a class="btn blue" href="{{ route('admin.produtos.adicionar') }}">Adicionar</a>

    </div>


<script>
  function confirmar()
  {
    return confirm("Tem certeza?");
  }

</script>

@endsection
