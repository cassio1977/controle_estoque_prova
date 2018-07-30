<div class="row">
  <div class="input-field col s12 m3">
    <input type="text" name="sku" value="{{isset($dados['sku']) ? $dados['sku'] : ''}}" placeholder="Digite o SKU">
    <label>SKU</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="dtini" value="{{isset($dados['dtini'])? $dados['dtini'] : ''}}"  placeholder="aaaa-mm-dd">
    <label>Data Inicial</label>
  </div>

  <div class="input-field col s12 m2">
    <input type="text" name="dtfim" value="{{isset($dados['dtfim'])? $dados['dtfim'] : ''}}" placeholder="aaaa-mm-dd">
    <label>Data final</label>
  </div>

  <div class="input-field col s12 m3">
      <p>
          <input type="checkbox" id="api" name="api" {{isset($dados['api']) ? 'checked' : '' }} value="true"/>
          <label for="api">API</label>
      </p>
  </div>
  <div class="col s12 m2">
    <button class="btn deep-orange">Filtrar <i class="material-icons dp48">search</i></button>
  </div>
  <br><br>
</div>
