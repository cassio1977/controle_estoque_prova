@extends('layout.site')

@section('titulo','Produtos')

@section('conteudo')
  <div class="container">
    <h3 class="center">Editando Produtos</h3>
    <div class="row">
      <form class="" action="{{route('admin.produtos.atualizar',$registro->sku)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.produtos._form')
        <button class="btn deep-orange">Atualizar</button>
      </form>
    </div>
  </div>




@endsection
