@extends('locadora-padrao.padrao')

@section('nomePagina', 'Visualizar e Alterar Usuario')

@section('conteudo')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 text-responsive text-left" style="margin-bottom: 3%">
		<a href="{{ route('controle') }}" title="Tela Inicial" class="btn btn-md btn-primary">Início</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h1 class="panel-title">Gerenciamento de Relatórios</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{ route('loginAlterarValidar') }}" method="post">
					<div class="form-group">
				    	<label class="col-sm-2 control-label">Nome: </label>
				    	<div class="col-sm-10">
				    		<input class="form-control" type="text" name="name" value="{{ $name }}" required>
				    	</div>
				   	</div>
					<div class="form-group">
				    	<label class="col-sm-2 control-label">E-mail: </label>
				    	<div class="col-sm-10">
				    		<input class="form-control" type="email" name="email" value="{{ $email }}" required>
				    	</div>
				   	</div>
					<div class="form-group">
				    	<label class="col-sm-2 control-label">Palavra Secreta: </label>
				    	<div class="col-sm-10">
				    		<input class="form-control" type="text" name="palavraPasse" value="{{ $palavraPasse }}" required>
				    	</div>
				   	</div>
					<div class="form-group">
				    	<label class="col-sm-2 control-label">Senha: </label>
				    	<div class="col-sm-10">
				    		<input class="form-control" type="password" name="password">
				    	</div>
				   	</div>
					<div class="form-group">
				    	<label class="col-sm-2 control-label">Confirmar Senha: </label>
				    	<div class="col-sm-10">
				    		<input class="form-control" type="password" name="password_confirmation">
				    	</div>
				   	</div>
				   	<div class="form-group">
				   		<div class="col-sm-10 col-sm-offset-1">
				   			<input class="btn btn-md btn-primary" type="submit" value="Alterar">
				   			<input type="hidden" name="id" value="{{ $id }}">
				   			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				   		</div>
				   	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection