@extends('base.padrao')

@section('nomePagina', 'Listar Filmes')

@section('conteudo')
<div class="row">
	@foreach ($filmes as $e)
		<div class="col-sm-6 col-md-4 mb-1">
	    	<div class="thumbnail">
		      	<div class="panel-body">
					<img class="img-responsive center-block" src="{{ asset('uploads/imagens/' . $e->imagem) }}" alt="{{ $e->titulo }}">
		      		<div class="caption">
		        		<h3 class="text-center">
		        			@if (strlen($e->titulo) >= 20)
		        				{{ substr($e->titulo, 0, 17) . "..." }}
		        			@else
		        				{{ $e->titulo }}
		        			@endif
		        		</h3>
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
	<div class="col-sm-12 col-md-12 mb-1 text-center">
		<div  class="page_navigation">
            {{ $videos->links() }}
        </div>	  		
	</div>
</div>
@endsection
