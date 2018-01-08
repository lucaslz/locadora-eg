<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Locavideo</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
							<div class="form-group">
								<div class="col-sm-12">
									<a href="#" title="Trocar Senha">
										Deseja alterar a senha ?
									</a>
								</div>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>