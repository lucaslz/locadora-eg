@extends('locadora-padrao.padrao')

@section('nomePagina', 'Preço e Desconto')

@section('conteudo')
<div class="row">
	<div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h1 class="panel-title">Gerenciamento e Controle de Precos</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="controlePreco" action="{{ route('precoDesconto') }}" method="post">
					<div class="form-group">
						<label for="idSelectPreco" class="col-sm-2 control-label">
							O que deseja fazer ?
						</label>
						<div class="col-sm-10">
							<select name="decisao" class="form-control" id="idSelectPreco">
								<option selected>Selecione</option>
								@if (isset($fazerPreco))
									@foreach ($fazerPreco as $element)
										<option value="{{ $element['id'] }}">
					    					{{ $element['preco'] }}
					    				</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					<span style="display: none;" id="divIncluirPrecoDesconto">
						<div class="alert alert-success text-center" role="alert">
							<strong>Incluir Preço e Desconto</strong>
						</div>
						<div class="form-group">
							<label for="inputPreco" class="form-label col-sm-2">Preço</label>
							<div class="col-sm-10">
								<input type="text" name="valor" id="inputPreco" class="form-control" placeholder="0.00" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputDesconto" class="form-label col-sm-2">Desconto</label>
							<div class="col-sm-10">
								<input type="text" name="desconto" id="inputDesconto" placeholder="00" class="form-control" required>
							</div>
						</div>
					</span>
					<span style="display: none;" id="divAlterarPreco">
						<div class="alert alert-success" role="alert">
							<strong>Preço Atual: </strong>
							@if (isset($precoAluguel->valor) && !empty($precoAluguel->valor))
								{{ "R$ " . number_format($precoAluguel->valor, 2, ',', '') }}
							@else
								{{ "R$ " . "0,00" }}
							@endif
						</div>
						<div class="form-group">
						    <label for="inputGenero" class="col-sm-2 control-label">
						    	Alterar Preço
						    </label>
							<div class="col-sm-10">
							   	<input type="text" name="preco" class="form-control precoControle" placeholder="0.00">
						    </div>
						</div>
					</span>
					<span style="display: none;" id="divAlterarDesconto">
						<div class="alert alert-success" role="alert">
							<strong>Desconto Atual: </strong>
							@if (isset($precoAluguel->desconto) && !empty($precoAluguel->desconto))
								{{ $precoAluguel->desconto }}
							@else
								{{ 0 }}
							@endif
						</div>
						<div class="form-group">
						    <label for="inputGenero" class="col-sm-2 control-label">
						    	Alterar Desconto
						    </label>
							<div class="col-sm-10">
							   	<input type="text" name="descontoAlt" class="form-control descontoControle" placeholder="00">
						    </div>
						</div>
					</span>
					<button type="button" class="btn btn-primary btn-block" value="Continuar" onclick="controlePreco();">
						Continuar
					</button>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="{{ $precoAluguel->id or "" }}">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection