<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Locavideo</title>
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <link rel="stylesheet" href="css/all.css">
    </head>
<body>
    <div id="app">
        <cabecalho-component></cabecalho-component>
        <barra-lateral-component></barra-lateral-component>
        <corpo-component></corpo-component>
    </div>
    <script src="js/app.js"></script>
</body>
