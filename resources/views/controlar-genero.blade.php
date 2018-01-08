@extends('locadora-padrao.padrao')

@section('nomePagina', 'Controlar Genero')

@section('conteudo')
<div class="row">
	<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title text-responsive text-center">
					Controlar Genero
				</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{ route('deletarECadastrarGenero') }}" method="post">
					<div class="form-group">
						<label for="idSelectGenero" class="col-sm-2 control-label">
							O que deseja fazer ?
						</label>
						<div class="col-sm-10">
							<select name="decisao" class="form-control" id="idSelectGenero">
								<option>Selecione</option>
								@if (isset($fazerGenero))
									@foreach ($fazerGenero as $element)
										<option value="{{ $element['id'] }}">
					    					{{ $element['genero'] }}
					    				</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					<span style="display: none;" id="divCadastrar">
						<div class="form-group">
						    <label for="inputGenero" class="col-sm-2 control-label">
						    	Nome do Genero
						    </label>
							<div class="col-sm-10">
							   	<input type="text" name="generoAdd" class="form-control" placeholder="Genero">
						    </div>
						</div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Cadastrar Genero</button>
					    	</div>
					  	</div>
					</span>
					<span style="display: none;" id="divDeletar">
						<div class="form-group">
							<label for="inputGenero" class="col-sm-2 control-label">
								Selecione o Genero
							</label>
							<div class="col-sm-10">
								<select name="generoDelete" class="form-control" id="idSelectGenero">
									<option>Selecione</option>
									@if (isset($genero))
										@foreach ($genero as $element)
											<option value="{{ $element->id }}">
					    						{{ $element->genero }}
					    					</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-danger">Deletar Genero</button>
					    	</div>
					  	</div>
					</span>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
		</div>
    </div>
</div>
@endsection
