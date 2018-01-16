@extends('locadora-padrao.padrao')

@section('nomePagina', 'Controle de Usuario')

@section('conteudo')
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		@if (isset($usuarios))
			<table id="locausers" class="table-responsive table table-hover">
		        <thead class="thead-inverse">
		            <tr>
		                <th>Nome</th>
		                <th>E-mail</th>
		                <th>Alterar</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach ($usuarios as $element)
			        	<tr>
			        		<td>{{ $element['name'] }}</td>
			        		<td>{{ $element['email'] }}</td>
	        				<td>
						    	<a href="{{ route('controleAlterar')."/".base64_encode(serialize($element['id'])) }}" class="btn btn-warning btn-sm">
						      		<span class="glyphicon glyphicon-wrench"></span>
						    	</a>
	        				</td>
			        	</tr>
		        	@endforeach
		        </tbody>
		    </table>
		@endif
	</div>
</div>
@endsection