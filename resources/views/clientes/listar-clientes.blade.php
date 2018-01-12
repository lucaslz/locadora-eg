@extends('locadora-padrao.padrao')

@section('nomePagina', 'Lista de Cliente')

@section('conteudo')
<div class="container-fluid">
	<div class="row" style="margin-bottom: 5%;">
		<div class="col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4">
		    <a href="{{ route('cadastrarCliente') }}" class="btn btn-primary btn-lg">
		      <span class="glyphicon glyphicon-save"></span>
		      Cadastrar Cliente
		    </a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		<table id="locausers" class="table-responsive table table-hover">
	        <thead class="thead-inverse">
	            <tr>
	                <th>Nome</th>
	                <th>CPF</th>
	                <th>Telefone</th>
	                <th>Email</th>
	                <th>Data Nascimento</th>
	                <th>Debito</th>
	                <th>Alterar</th>
	                <th>Deletar</th>
	                <th>Pagar Débito</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach ($clientes as $element)
	        		<tr>
	        			<td>{{ $element->nome }}</td>
	        			<td>{{ $element->cpf }}</td>
	        			<td>{{ $element->telefone }}</td>
	        			<td>{{ $element->eMail }}</td>
	        			<td>{{ date_format(date_create($element->dataNascimento), 'd-m-Y') }}</td>
	        			<td>
	        				@if (is_null($element->total) || empty($element->total))
	        					{{ "R$ " . "0,00" }}
	        				@else
	        					{{ "R$ " . number_format($element->total, 2, ',') }}
	        				@endif
	        			</td>
	        			<td>
						    <a href="{{ route('alterarCliente')."/".$element->idClienteEndereco }}" class="btn btn-warning btn-sm">
						      	<span class="glyphicon glyphicon-wrench"></span>
						    </a>
	        			</td>
	        			<td>
						    <a data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm">
						      	<span class="glyphicon glyphicon-remove"></span>
						    </a>
	        			</td>
	        			<td>
	        				@if(empty($element->total))
							    <a href="{{ route('alterarCliente')."/".$element->idClienteEndereco }}" class="btn btn-success btn-sm">
							      	<span class="glyphicon glyphicon-ok"></span>
							    </a>
	        				@else
							    <a href="{{ route('alterarCliente')."/".$element->idClienteEndereco }}" class="btn btn-primary btn-sm">
							      	<span class="glyphicon glyphicon-usd"></span>
							    </a>
	        				@endif
	        			</td>
	        		</tr>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h4 class="modal-title text-center alert alert-warning" role="alert" id="myModalLabel">
					        			<strong>Atenção!</strong>
					        		</h4>
					      		</div>
					      		<div class="modal-body text-center text-responsive">
					        		<h3 style="color: green;">
					        			Deseja Realmente Excluir o Cliente?
					        		</h3>
					      		</div>
					      		<div class="modal-footer">
					        		<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
					        		<a href="{{ route('deletarCliente')."/".$element->idClienteEndereco }}" title="deletar" class="btn btn-danger">Deletar</a>
					      		</div>
					    	</div>
					  	</div>
					</div>
	        	@endforeach
	        </tbody>
    	</table>
	</div>
</div>
@endsection