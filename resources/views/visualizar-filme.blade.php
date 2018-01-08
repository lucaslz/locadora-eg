@extends('locadora-padrao.padrao')

@section('nomePagina', 'Visualizar Filmes')

@section('conteudo')
<div class="row">
	<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		<a href="{{ route('home') }}" title="Voltar" class="btn btn-md btn-primary" style="margin-bottom: 3%">
			Voltar
		</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		<div class="panel panel-primary">
		  	<div class="panel-heading text-center">
		    	<h1 class="panel-title">{{ $filme->titulo }}</h1>
		  	</div>
		  	<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<img class="img-responsive center-block" src="{{ asset($filme->imagem) }}" alt="{{ $filme->titulo }}">
					</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Genero</label>
				    	<div class="col-sm-10">
				    		<input type="text" value="{{ $filme->genero }}" readonly>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Descrição</label>
				    	<div class="col-sm-10">
				      		<textarea rows="7" class="form-control" readonly>{{ $filme->descricao }}</textarea>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Disponível</label>
				    	<div class="col-sm-10">
				    		@if ($filme->disposicao == 1)
				    			<h4>
				    				<span class="label label-success">Sim</span>
				    			</h4>
				    		@else
				    			<h4>
				    				<span class="label label-warning">Sim</span>
				    			</h4>
				    		@endif
				    	</div>
				  	</div>
				</form>
		  	</div>
		  	<div class="panel-footer text-center text-responsive">
		  		<a href="{{ route('alterarFilme') . '/' . $filme->id }}" title="Alterar" class="btn btn-md btn-primary">
		  			Alterar
		  		</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
				  	Deletar
				</button>
		  		@if ($filme->disposicao == 1)
		  			<a href="{{ route('alugarFilme') . '/' . $filme->id  }}" title="Alugar" class="btn btn-md btn-warning">
		  				Alugar
		  			</a>
		  		@endif
		  	</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center text-responsive alert alert-warning">
                    <strong>Atenção!</strong>
                </h2>
            </div>
            <div class="modal-body text-center text-responsive">
                <h3>Deseja realmente deletar o Filme ?</h3>
            </div>
            <div class="modal-footer">
             <div class="col-sm-12">
                <div class="col-sm-5">
	                <button type="button" class="btn btn-primary" data-dismiss="modal">
	                	Fechar
	                </button>
                </div>
                <div class="col-sm-5">
	                <form action="{{ route('deleteFilme') }}" method="post" accept-charset="utf-8">
	                	<input type="submit" class="btn btn-danger" value="Deletar Filme">
	                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                	<input type="hidden" name="idFilme" value="{{ $filme->id }}">
	                </form>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection