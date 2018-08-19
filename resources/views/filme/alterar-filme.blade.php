@extends('base.padrao')

@section('nomePagina', 'Alterar Filme')

@section('conteudo')
<div class="row">
	<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title text-responsive text-center">
					Alterar Filme
				</h1>
			</div>
			<div class="panel-body">
				<form action="{{ route('updateFilme') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<img class="img-responsive center-block" src="{{ asset($filme->imagem) }}" alt="{{ $filme->titulo }}">
					</div>
				  	<div class="form-group">
				    	<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="titulo" value="{{ $filme->titulo }}" class="form-control" id="inputTitulo" placeholder="Titulo">
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="inputDescricao" class="col-sm-2 control-label">Descrição</label>
				    	<div class="col-sm-10">
				    		<textarea class="form-control" name="descricao" id="inputDescricao" rows="7" placeholder="Descrição do Filme">{{ $filme->descricao }}</textarea>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="inputGenero" class="col-sm-2 control-label">Genero</label>
				    	<div class="col-sm-10">
				    		<select name="idGenero" class="form-control" id="inputGenero">
				    			@if (isset($genero))
				    				@foreach ($genero as $element)
				    					@if ($filme->idGenero == $element->id)
				    						<option value="{{ $element->id }}" selected>
				    							{{ $element->genero }}
				    						</option>
				    					@else
				    						<option value="{{ $element->id }}">
				    							{{ $element->genero }}
				    						</option>
				    					@endif
				    				@endforeach
				    			@endif
				    		</select>
				    	</div>
				  	</div>
					<div class="form-group">
						<div class="upload-btn-wrapper">
						  	<label for="inputFile" class="col-sm-2 control-label">Selecionar Imagem</label>
						  	<div class="col-sm-10">
						  		<input type="file" name="imagem" />
						  	</div>
						</div>
					</div>
				  	<div class="form-group">
				  		<div class="col-sm-10 col-sm-offset-2">
				  			<input type="submit" class="btn btn-md btn-primary">
				  		</div>
				  	</div>
				  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  	<input type="hidden" name="id" value="{{ $filme->id }}">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
