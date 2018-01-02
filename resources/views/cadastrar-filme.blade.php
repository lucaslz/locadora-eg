@extends('locadora-padrao.padrao')

@section('nomePagina', 'Cadastrar Filme')

@section('conteudo')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title text-responsive text-center">Panel title</h2>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" enctype="multipart/form-data">
		  	<div class="form-group">
		    	<label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
		    	<div class="col-sm-10">
		      		<input type="titulo" class="form-control" id="inputTitulo" placeholder="Titulo">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputDescricao" class="col-sm-2 control-label">Descrição</label>
		    	<div class="col-sm-10">
		    		<textarea class="form-control" ame="descricao" id="inputDescricao" rows="7" placeholder="Descrição do Filme"></textarea>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputGenero" class="col-sm-2 control-label">Genero</label>
		    	<div class="col-sm-10">
		    		<select name="genero" class="form-control" id="inputGenero">
		    			@if (isset($genero))
		    				@foreach ($genero as $element)
		    					<option value="{{ $element->id }}">{{ $element->genero }}</option>
		    				@endforeach
		    			@else
		    				<option>Nenhum genero disponível</option>
		    			@endif
		    		</select>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<div class="col-sm-10 col-sm-offset-2">
		    		<input type="file" name="imagem" class="form-control">
		    	</div>
		  	</div>
		  	<div class="form-group">
		  		<div class="col-sm-10 col-sm-offset-2">
		  			<input type="submit" class="btn btn-md btn-primary">
		  		</div>
		  	</div>
		</form>
	</div>
</div>
@endsection