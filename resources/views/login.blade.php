<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Locavideo</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <style type="text/css">
    	body {
    		background-image: url("img/background.jpg");
    		background-color: #E8E8E8;
		    background-repeat: repeat;
		    background-attachment: fixed;
		    background-position: center;
		    background-size: auto;
    	}

    	.panel-default {
    		opacity: 0.9;
    		margin-top: 25%;
    	}
    </style>
</head>
<body>
	<main>
		<div class="container-fluid">
			<div class="col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel panel-heading text-center text-responsive">
						Login Locavideo
					</div>
					<div class="panel panel-body">
						@if ($errors->any())
					    	<div class="alert alert-danger">
					    		<strong>Whoops!</strong> Houve um problema com seus campos.
					        	<ul>
					        		@foreach ($errors->all() as $error)
					            		<li>{{ $error }}</li>
					        		@endforeach
					        	</ul>
					    	</div>
						@endif
						@if (session()->has('success'))
							<div class="alert alert-success">
								<strong>Parabéns! </strong>{{ session('success') }}
							</div>
						@elseif(session()->has('error'))
							<div class="alert alert-danger">
								<strong>Opa! </strong>{{ session('error') }}
							</div>
						@endif
						<form action="{{ route('doLogin') }}" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="login" class="col-sm-2 control-label">Login</label>
								<div class="col-sm-10">
									<input type="text" name="name" class="form-control" placeholder="Login">
								</div>
							</div>
							<div class="form-group">
								<label for="login" class="col-sm-2 control-label">Senha</label>
								<div class="col-sm-10">
									<input type="password" name="password" class="form-control" placeholder="Senha">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="submit" class="btn btn-md btn-primary btn-block" value="Entrar">
								</div>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
						<div class="col-sm-12 text-center">
							<div class="col-sm-6">
								<!-- Button Trigger Modal Reset Senha -->
								<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#recSenha">
								  	Recuperar Senha
								</button>
							</div>
							<div class="col-sm-6">
								<!-- Button Trigger Modal -->
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#criarUser">
								  	Criar Usuario
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('js/all.js') }}"></script>
		<!-- Modal -->
		<div class="modal fade" id="recSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h4 class="modal-title text-center text-responsive" id="myModalLabel">
		        			<strong>Alterar Senha</strong>
		        		</h4>
		        		<h5 class="modal-title text-center text-responsive alert alert-warning" role="alert">
		        			Para alterar a senha é preciso Ter a Palavra-Passe
		        		</h5>
		      		</div>
		      		<div class="modal-body">
		        		<form class="form-horizontal" action="{{ route('resetePassword') }}" method="post" id="form1">
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Login</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="text" name="name" required>
		        				</div>
		        			</div>
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Palavra-Passe</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="text" name="palavraPasse" required>
		        				</div>
		        			</div>
		      				<div class="modal-footer">
		        				<button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
		        				<button class="btn btn-primary" onclick="tratarBotaoSubmit(1)">Recuperar</button>
		        				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		      				</div>
		        		</form>
		    		</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="criarUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h4 class="modal-title text-center text-responsive" id="myModalLabel">
		        			<strong>Criar Usuario</strong>
		        		</h4>
		      		</div>
		      		<div class="modal-body">
		        		<form class="form-horizontal" action="{{ route('criarPassword') }}" method="post" id="form2">
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Login:</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="text" name="name" required>
		        				</div>
		        			</div>
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">E-mail:</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="email" name="email" required>
		        				</div>
		        			</div>
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Palavra-Passe:</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="text" name="palavraPasse" required>
		        				</div>
		        			</div>
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Senha:</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="password" name="password" required>
		        				</div>
		        			</div>
		        			<div class="form-group">
		        				<label class="form-label col-sm-3">Confirmar Senha:</label>
		        				<div class="col-sm-9">
		        					<input class="form-control" type="password" name="password_confirmation" required>
		        				</div>
		        			</div>
		      				<div class="modal-footer">
		        				<button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
		        				<button class="btn btn-primary" onclick="tratarBotaoSubmit(2)">Criar Usuario</button>
		        				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		      				</div>
		        		</form>
		    		</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		function tratarBotaoSubmit(sltForm){
			console.log(sltForm);
			if (sltForm == 1) {
				var form = document.querySelector("#form1");
				form.submit;
			} else {
				var form = document.querySelector("#form2");
				form.submit;
			}
		}
	</script>
</body>
</html>
