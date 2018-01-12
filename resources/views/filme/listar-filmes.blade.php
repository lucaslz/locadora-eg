@extends('locadora-padrao.padrao')

@section('nomePagina', 'Listar Filmes')

@section('conteudo')
<div class="row">
	@foreach ($filmes as $e)
	<div class="col-sm-6 col-md-3">
    	<div class="thumbnail">
	      	<div class="panel-body">
				<img class="img-responsive center-block" src="{{ asset('uploads/imagens/' . $e->imagem) }}" alt="{{ $e->titulo }}">
	      		<div class="caption">
	        		<h3 class="text-center">{{ $e->titulo }}</h3>
	        		<p class="text-center">
	        			<a href="{{ route('visualizarFilme') . "/" . $e->id }}" class="btn btn-lg btn-primary" role="button">
	        				Visualizar
	        			</a>
	        		</p>
	      		</div>
	    	</div>
  		</div>
  	</div>
	@endforeach
</div>
@endsection