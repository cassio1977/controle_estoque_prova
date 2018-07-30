<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
    //
    protected $fillable =[
      'sku','quantidade','tipo','api','obs','data','user',
    ];

  //  protected table = 'Estoques';

    public function Produto () {
      return $this->belongsTo(Produto::class, 'SKU'); //hasMany
    }
}
