<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable =[
      'titulo','descricao','imagem','valor','publicado','api',
    ];

  /*  protected table = 'Produtos';

    public function estoque () {
      return $this->belongsTo(Estoque::class, 'SKU'); //hasMany
    }*/
    protected $primaryKey = 'sku';
}
