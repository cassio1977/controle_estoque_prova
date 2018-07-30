@extends('layout.site')
@section('titulo','Relatório')
@section('conteudo')

<div class="container">
  <h4 class="center">Relatório de Movimentação <small>{{isset($dados['dtini']) ? $dados['dtini'] : ''}} {{isset($dados['dtfim']) ? $dados['dtfim'] : ''}}</small></h4>
  <div class="row">
    <form class="" action="{{route('admin.estoque.relatoriop')}}" method="post">
      {{ csrf_field() }}
      @include('admin.estoque._form2')
    </form>
  </div>
</div>
<div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Id SKU</th>
          <th>Quantidade</th>
          <th>Tipo</th>
          <th>API</th>
          <th>OBS</th>
          <th>Data</th>
          <th>User</th>
        </tr>
      </thead>
      <tbody>
      @if(isset($registros))
        @foreach($registros as $registro)
          <tr>
            <td>{{ $registro->id }}</td>
            <td><a href="{{ route('admin.produtos.editar',$registro->sku) }}">{{ $registro->sku }}</a></td>
            @if($registro->tipo=='e')
            <td>{{ $registro->quantidade }}</td>
            <td>Entrada</td>
            @else
            <td style="color:red;">-{{ $registro->quantidade }}</td>
            <td>Saída</td>
            @endif
            <td>{{ $registro->api }}</td>
            <td>{{ $registro->obs }}</td>
            <td>{{ $registro->data }}</td>
            <td>{{ $registro->user }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
