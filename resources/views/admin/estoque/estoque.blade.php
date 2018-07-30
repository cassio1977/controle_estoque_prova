@extends('layout.site')

@section('titulo','Estoque')

@section('conteudo')
  <div class="container">
    <h3 class="center">Estoque de Produtos -> <b>{{$tipo == 'e' ? 'Entrada' : 'Saída' }}</b></h3>
    <div class="row">
      <form class="" action="{{route('admin.estoque.salvar',$registro->sku)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.estoque._form')
        <button class="btn deep-orange">Adicionar</button>
      </form>
    </div>
  </div>




@endsection
