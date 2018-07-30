<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;

class HomeController extends Controller
{
    public function index()
    {
      $produtos = Produto::paginate(3);
      return view('home',compact('produtos'));
    }
}
