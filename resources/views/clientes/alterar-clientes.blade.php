@extends('locadora-padrao.padrao')

@section('nomePagina', 'Alterar Cliente')

@section('conteudo')
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		<a href="{{ route('clientes') }}" title="lista de clientes" class="btn btn-sm btn-primary" style="margin-bottom: 3%">
			Lista de Clientes
		</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h1 class="panel-title">Alteração de Cliente</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{ route('alterarValidarCliente') }}" method="post">
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Nome</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">CPF</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="cpf" class="form-control cpf" value="{{ $cliente->cpf }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Telefone</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="telefone" class="form-control telefone" value="{{ $cliente->telefone }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Email</label>
				    	<div class="col-sm-10">
				      		<input type="email" name="eMail" class="form-control" value="{{ $cliente->eMail }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Data Nascimento</label>
				    	<div class="col-sm-10">
				      		<input type="date" name="dataNascimento" class="form-control" value="{{ $cliente->dataNascimento }}" required>
				    	</div>
				  	</div>
				  	<div class="well well-sm text-responsive text-center" style="font-weight: bolder;">
				  		Cadastro de Endereço
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Endereço</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="endereco" class="form-control" value="{{ $endereco->endereco }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Bairro</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="bairro" class="form-control" value="{{ $endereco->bairro }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">CEP</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="cep" class="form-control cep" value="{{ $endereco->cep }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Numero</label>
				    	<div class="col-sm-10">
				      		<input type="text" name="numero" class="form-control" value="{{ $endereco->numero }}" required>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-primary">Alterar</button>
				    	</div>
				  	</div>
				  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  	<input type="hidden" name="idCliente" value="{{ $cliente->idCliente }}">
				  	<input type="hidden" name="idEndereco" value="{{ $endereco->idEndereco }}">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection