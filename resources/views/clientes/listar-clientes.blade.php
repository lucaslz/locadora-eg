@extends('base.padrao')

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
	<div class="col-sm-12 col-md-12">
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
	        					{{ "R$ " . "0.00" }}
	        				@else
	        					{{ "R$ " . number_format($element->total, 2, '.', '') }}
	        				@endif
	        			</td>
	        			<td>
						    <a href="{{ route('alterarCliente')."/".$element->idClienteEndereco }}" class="btn btn-warning btn-sm">
						      	<span class="glyphicon glyphicon-wrench"></span>
						    </a>
	        			</td>
	        			<td>
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDeletar">
	  							<span class="glyphicon glyphicon-remove"></span>
							</button>
	        			</td>
	        			<td>
	        				@if(empty($element->total))
							    <button class="btn btn-success btn-sm" disabled>
							      	<span class="glyphicon glyphicon-ok"></span>
							    </button>
	        				@else
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalPagar">
	  								<span class="glyphicon glyphicon-usd"></span>
								</button>
	        				@endif
	        			</td>
	        		</tr>
	        	@endforeach
	        </tbody>
    	</table>
	</div>
</div>
{{-- modal para pagar conta --}}
<div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header bg-warning">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">
        			<b style="color: white">Pagar Conta!</b>
        		</h4>
      		</div>
      		<div class="modal-body">
        		<span style="font-weight: bolder; font-size: 1.5em;">
        			Deseja abater a conta do cliente ?
        		</span>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">
        			Sair
        		</button>
				<a href="{{ route('pagarClientes') .'/'. $element->idClienteEndereco }}" class="btn btn-success">
					Pagar
				</a>
      		</div>
    	</div>
  	</div>
</div>

{{-- modal para deletar usuario --}}
<div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header bg-warning">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">
        			<b style="color: white">Deletar Usuario!</b>
        		</h4>
      		</div>
      		<div class="modal-body">
        		<span style="font-weight: bolder; font-size: 1.5em;">
        			Deseja realmente <span style="color: red;">deletar</span> o usuário ?
        		</span>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">
        			Sair
        		</button>
				<a href="{{ route('deletarCliente')."/".$element->idClienteEndereco }}" class="btn btn-success">
				 	Deletar
				</a>
      		</div>
    	</div>
  	</div>
</div>
@endsection
