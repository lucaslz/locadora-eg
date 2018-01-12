<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Locavideo</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}"/>
    {{-- scripts --}}
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
	                  		<a href="{{ route('logout') }}">
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
	    	{{-- <div class="container-fluid"> --}}
		        <ul class="nav menu">
		         	<li {{ $activeListar or "" }} id="ativa">
		         		<a href="{{ route('home') }}">
		         			<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
		         			Lista de Filmes
		         		</a>
		         	</li>
		          	<li {{ $activeCadastrar or "" }} id="ativa">
		          		<a href="{{ route('cadastrarFilme') }}">
		          			<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
		          			Cadastrar Filme
		          		</a>
		          	</li>
		          	<li {{ $activeGenero or "" }} id="ativa">
		          		<a href="{{ route('controlarGenero') }}">
		          			<span class="glyphicon glyphicon-move" aria-hidden="true"></span>
		          			Controlar Genero
		          		</a>
		          	</li>
		          	<li {{ $activeClientes or "" }} id="ativa">
		          		<a href="{{ route('clientes') }}">
		          			<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
		          			Lista de Clientes
		          		</a>
		          	</li>
		        </ul>
		        <div class="attribution">
		        	<b>Criado por: </b><br/>
		        	Lucas Lima<br>
		        	Icaro Quintão<br>
		        	Thiago Rocha<br>
		        	Saulo Henrrique
		        </div>
	        {{-- </div> --}}
	   	</div>
	</aside>
	<main>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
			<div class="row">
				<ol class="breadcrumb">
					<li>
						<a href="#">
				    		<svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
				    	</a>
				    </li>
				    <li class="active">
				    	@yield('nomePagina')
				    </li>
				</ol>
			</div>
			<br />
			<div class="row">
				<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
					@if ($errors->any())
					    <div class="alert alert-danger">
					    	<strong>Whoops!</strong> Houve um problema com seus campos.
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					@if (session()->has('success'))
						<div class="alert alert-success">
							<strong>Parabéns! </strong>{{ session('success') }}
						</div>
					@elseif(session()->has('error'))
						<div class="alert alert-danger">
							<strong>Opa! </strong>{{ session('error') }}
						</div>
					@endif
				</div>
			</div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-film fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalFilmes->total }}</div>
                                    <div>Total de Filmes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalClientes->total }}</div>
                                    <div>Total de Clientes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalLocacoe->total }}</div>
                                    <div>Filmes Alugados!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			<br />
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					@yield('conteudo')
				</div>
			</div>
		</div>
	</main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- Script para controle de genero --}}
    <script>
    	$('#idSelectGenero').on('change', function(){
    		var tipo = $(this).val();

    		if(tipo == 1) {
    			$('#divDeletar').css('display','none');
    			$('#divCadastrar').css('display','block');
    		}else if(tipo == 2){
    			$('#divCadastrar').css('display','none');
    			$('#divDeletar').css('display','block');
    		}else {
    			$('#divDeletar').css('display','none');
    			$('#divCadastrar').css('display','none');
    		}
    	});
    </script>
    <script src="{{ asset('js/lumino.glyphs.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
		$(document).ready(function() {
		    $('#locausers').DataTable( {
		        "language": {
		        	"Processing":   "A processar...",
		            "lengthMenu": "Mostrar _MENU_ registos",
		            "zeroRecords": "Não foram encontrados resultados",
		            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
		            "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
		            "infoFiltered": "(filtrado de _MAX_ registos no total)",
		            "InfoPostFix":  "",
		            "sSearch": "Procurar:",
		            "sUrl": "",
		            "oPaginate": {
				        "sFirst":    "Primeiro",
				        "sPrevious": "Anterior",
				        "sNext":     "Seguinte",
				        "sLast":     "Último"
				    }
		        }
		    } );
		} );
    </script>
    <script type="text/javascript" src="{{ asset('jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
    	$(function() {
    		$('.cpf').mask('000.000.000-00', {reverse: true});
    		$('.telefone').mask('(00) 0 0000-0000');
    		$('.cep').mask('00000-000');
    	});
    </script>
 </body>
</html>