<!DOCTYPE html>
<html>
<head>
  <title>@yield('titulo')</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
  <nav>
   <div class="nav-wrapper deep-orange">
     <div class="container">
       <a href="#!" class="brand-logo">Contacta<b>max</b> Prova</a>
       <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
       <ul class="right hide-on-med-and-down">
         <li><a href="/">Home</a></li>
         @if(Auth::guest())
           <li><a href="{{route('site.login')}}">Login</a></li>
         @else
           <li><a href="{{route('admin.produtos')}}">Produtos</a></li>
           <li><a href="{{route('admin.produtos.filtrar','s')}}">Via API</a></li>
           <li><a href="{{route('admin.produtos.filtrar','n')}}">Via Form</a></li>
           <li><a href="{{route('admin.estoque.relatorio')}}">Relatório</a></li>
           <li><a href="#">{{Auth::user()->name}}</a></li>
           <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
         @endif

       </ul>
       <ul class="side-nav" id="mobile">
         <li><a href="/">Home</a></li>
         @if(Auth::guest())
           <li><a href="{{route('site.login')}}">Login</a></li>
         @else
           <li><a href="{{route('admin.produtos')}}">Produtos</a></li>
           <li><a href="{{route('admin.produtos.filtrar','s')}}">Via API</a></li>
           <li><a href="{{route('admin.produtos.filtrar','n')}}">Via Form</a></li>
           <li><a href="{{route('admin.estoque.relatorio')}}">Relatório</a></li>
           <li><a href="#">{{Auth::user()->name}}</a></li>
           <li><a href="{{ route('site.login.sair') }}">Sair</a></li>
         @endif
       </ul>
     </div>
   </div>
 </nav>
</header>
