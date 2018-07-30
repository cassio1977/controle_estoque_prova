<div class="row">
  <div class="input-field col s12 m1">
    <input type="text" name="sku" value="{{$registro->sku}}" readonly="true">
    <label>SKU</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="titulo" value="{{isset($registro->titulo) ? $registro->titulo : ''}}" readonly="true">
    <label>Título</label>
  </div>

  <div class="input-field col s12 m4">
    <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}" readonly="true">
    <label>Descrição</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}" readonly="true">
    <label>Valor</label>
  </div>

  <div class="input-field col s12 m2">
    @if(isset($registro->imagem))
    <img width="100" src="{{asset($registro->imagem)}}" />
    @endif
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="total" id="total" value="{{ $estoque}}" readonly="true">
    <label>Total em estoque</label>
  </div>
  <div class="input-field col s12 m3">
    <input type="text" name="quantidade" id="quantidade"  value="0">
    <label>Quantidade</label>
    <a class="btn deep-orange mais">+</a>
    <a class="btn deep-orange menos">-</a>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="obs" value="">
    <label>OBS</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="user" value="{{Auth::user()->name}}" readonly="true">
    <label>Usuário</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="data" value="{{date('Y-m-d H:i:s')}}" readonly="true">
    <label>Data</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s4 m4">
      <p>
          <input type="checkbox" id="Tipoe" name="Tipoe" onclick="return false;" {{$tipo == 'e' ? 'checked' : '' }} value="true" />
          <label for="Tipoe">Entrada</label>
      </p>
  </div>
  <div class="input-field col s4 m4">
      <p>
          <input type="checkbox" id="Tipos" name="Tipos" onclick="return false;" {{$tipo == 's' ? 'checked' : '' }} value="true" />
          <label for="Tipos">Saída</label>
      </p>
  </div>
  <div class="input-field col s4 m4">
      <p>
          <input type="checkbox" id="api" name="api"  onclick="return false;" {{isset($registro->api) && $registro->api == 's' ? 'checked' : '' }} value="true" />
          <label for="api">API</label>
      </p>
  </div>
      <br><br>
  </div>
