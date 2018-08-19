<main>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                    <svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
                </a>
            </li>
            <li class="active">
                @yield('nomePagina')
            </li>
        </ol>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
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
        </div>
    </div>
    @if (isset($totalFilmes) && isset($totalClientes) && isset($totalLocacoe))
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalFilmes->total }}</div>
                            <div>Filmes</div>
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
        <div class="col-lg-3 col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalClientes->total }}</div>
                            <div>Clientes</div>
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
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalLocacoe->total }}</div>
                            <div>Alugados</div>
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
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                @if (isset($precoAluguel->valor))
                                {{ "R$ " . number_format($precoAluguel->valor, 2, ',', '') }}
                                @else
                                {{ "R$ " ."0,00" }}
                                @endif
                            </div>
                            <div>Preço</div>
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
    <br />
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @yield('conteudo')
        </div>
    </div>
</div>
</main>
