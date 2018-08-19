<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Locavideo</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>
<body>
	{{-- Barra de navegacao superior --}}
	@yield('cabecalho')
    {{-- Barra de navegacao lateral --}}
    @yield('barra-lateral')
    {{-- Corpo do sistema --}}
    @yield('corpo')	
    <script src="{{ asset('js/all.js') }}"></script>
 </body>
</html>
