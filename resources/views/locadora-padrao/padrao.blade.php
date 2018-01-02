<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Locavideo</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- scripts --}}
    <script src="{{ asset('js/lumino.glyphs.js') }}" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	{{-- Barra de navegacao superior --}}
	<header>
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
	              	<span class="sr-only">Toggle navigation</span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand text-responsive" href="#">
	            	Locavideos
	            </a>
	            <ul class="user-menu">
	              	<li class="dropdown pull-right">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                	<svg class="glyph stroked male-user">
	                		<use xlink:href="#stroked-male-user"></use>
	                	</svg>
	                	Usuário
	                	<span class="caret"></span>
	                </a>
	                <ul class="dropdown-menu" role="menu">
	                  	<li>
	                  		<a href="#">
	                  			<svg class="glyph stroked male-user">
	                  				<use xlink:href="#stroked-male-user"></use>
	                  			</svg>
	                  			Perfil
	                  		</a>
	                  	</li>
	                  	<li>
	                  		<a href="#">
	                  			<svg class="glyph stroked cancel">
	                  				<use xlink:href="#stroked-cancel"></use>
	                  			</svg>
	                  			Sair
	                  		</a>
	                  	</li>
	                </ul>
	              </li>
	            </ul>
	          </div>
	        </div>
	    </nav>
	</header>
    {{-- Barra de navegacao lateral --}}
	<aside>
	    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	    	<div class="container-fluid">
		        <ul class="nav menu">
		         	<li {{ $activeListar or "" }} id="ativa">
		         		<a href="{{ route('home') }}">
		         			<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
		         			Lista de Filmes
		         		</a>
		         	</li>
		          	<li {{ $activeCadastrar or "" }} id="ativa">
		          		<a href="{{ route('cadastrarFilme') }}">
		          			<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
		          			Cadastrar Filme
		          		</a>
		          	</li>
		          	<li {{ $activeClientes or "" }} id="ativa">
		          		<a href="tables.html">
		          			<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
		          			Lista de Clientes
		          		</a>
		          	</li>
		          	<li {{ $activeUsuarios or "" }} id="ativa">
		          		<a href="tables.html">
		          			<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
		          			Lista de Usuarios
		          		</a>
		          	</li>
		        </ul>
{{-- 		        <div class="attribution">
		        	<b>Criado por: </b><br/>
		        	Lucas Lima<br>
		        	Icaro Quintão<br>
		        	Thiago Rocha<br>
		        	Saulo Henrrique
		        </div> --}}
	        </div>
	   	</div>
	</aside>
	<main>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="container-fluid espaco-abaixo">
				<div class="row">
				    <ol class="breadcrumb">
				    	<li>
				    		<a href="#">
				    			<svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
				    		</a>
				    	</li>
				      <li class="active">@yield('nomePagina')</li>
				    </ol>
				</div>
			</div>
			<br />
			<div class="container-fluid">
				<div class="row">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
			</div>
			<br />
			<div class="container-fluid">
				<div class="row">
					@yield('conteudo')
				</div>
			</div>
		</div>
	</main>
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/active-menu.js') }}"></script>
 </body>
</html>