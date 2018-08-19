@extends('locadora-padrao.padrao')

@section('nomePagina', 'Relatório')

@section('conteudo')
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 mb-2">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h1 class="panel-title">Gerenciamento de Relatórios</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{ route('semanalRelatorios') }}" method="post">
				  	<div class="form-group">
				    	<label class="col-sm-2 control-label">Tipo Relatório: </label>
				    	<div class="col-sm-10">
				    		<select name="idRelatorio" class="form-control">
				    			<option>Selecione</option>
				    			@foreach ($relatorioSelect as $element)
				    				<option value="{{ $element['id'] }}">{{ $element['nome'] }}</option>
				    			@endforeach
				    		</select>
				    	</div>
				  	</div>
				  	<div class="col-sm-4 col-sm-offset-4">
				  		<input type="submit" value="Exibir Relatório" class="btn btn-primary">
				  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  	</div>
				</form>
			</div>
		</div>
		@if (isset($saldo))
			<div class="row">
		        <div class="col-lg-6 col-md-6 col-md-offset-3 col-lg-offset-3">
		            <div class="panel panel-danger">
		                <div class="panel-heading">
		                    <div class="row">
	                            <div class="col-xs-4">
	                                <i class="fa fa-usd fa-5x"></i>
	                            </div>
		                        <div class="col-xs-8 text-right">
		                        	<div class="text-responsive">Total à receber</div>
		                            <div class="huge">
		                            	{{ $saldo['receber']->total}}
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <a href="#">
		                    <div class="panel-footer">
		                        <div class="clearfix"></div>
		                    </div>
		                </a>
		            </div>
		        </div>
		        <div class="col-lg-6 col-md-6">
		            <div class="panel panel-info">
		                <div class="panel-heading">
		                    <div class="row">
	                            <div class="col-xs-4">
	                                <i class="fa fa-usd fa-5x"></i>
	                            </div>
		                        <div class="col-xs-8 text-right">
		                        	<div class="text-responsive">Total Semanal</div>
		                            <div class="huge">
		                            	{{ $saldo['semana']->total }}
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <a href="#">
		                    <div class="panel-footer">
		                        <div class="clearfix"></div>
		                    </div>
		                </a>
		            </div>
		        </div>
		        <div class="col-lg-6 col-md-6">
		            <div class="panel panel-info">
		                <div class="panel-heading">
		                    <div class="row">
	                            <div class="col-xs-4">
	                               	<i class="fa fa-usd fa-5x"></i>
	                            </div>
		                        <div class="col-xs-8 text-right">
		                        	<div class="text-responsive">Total Mensal</div>
		                            <div class="huge">
		                            	{{ $saldo['mes']->total}}
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <a href="#">
		                    <div class="panel-footer">
		                        <div class="clearfix"></div>
		                    </div>
		                </a>
		            </div>
		        </div>
			</div>
		@endif
		@if (isset($relatorio))
			<div class="text-center text-responsive alert alert-info" role="alert">
		        <h3>{{ "Relatório " . $msnRelatorio . "!"}}</h3>
		    </div>
			<table id="locausers" class="table-responsive table table-hover">
		        <thead class="thead-inverse">
		            <tr>
		                <th>Cliente</th>
		                <th>Filme</th>
		                <th>Data Locação</th>
		                <th>valor</th>
		                <th>Pago ?</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach ($relatorio as $element)
			        	<tr>
			        		<td>{{ $element->cliente }}</td>
			        		<td>{{ $element->nomeFilme }}</td>
			        		<td>{{ $element->dataLocacao }}</td>
			        		<td>{{ $element->valorLocacao }}</td>
			        		<td>
			        			@if ($element->pago == 1)
			        				<span class="label label-success">Sim</span>
			        			@else
			        				<span class="label label-warning">Não</span>
			        			@endif
			        		</td>
			        	</tr>
		        	@endforeach
		        </tbody>
		    </table>
		@endif
	</div>
</div>
@endsection
