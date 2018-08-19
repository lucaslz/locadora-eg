<aside>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li {{ $activeListar or "" }} id="ativa">
                <a href="{{ route('home') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    Lista de Filmes
                </a>
            </li>
            <li {{ $activeCadastrar or "" }} id="ativa">
                <a href="{{ route('cadastrarFilme') }}">
                    <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
                    Cadastrar Filme
                </a>
            </li>
            <li {{ $activeGenero or "" }} id="ativa">
                <a href="{{ route('controlarGenero') }}">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    Controlar Genero
                </a>
            </li>
            <li {{ $activeClientes or "" }} id="ativa">
                <a href="{{ route('clientes') }}">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    Lista de Clientes
                </a>
            </li>
            <li {{ $activePreco or "" }} id="ativa">
                <a href="{{ route('gerenciarPreco') }}">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                    Preco e Desconto
                </a>
            </li>
            <li {{ $activeUser or "" }} id="ativa">
                <a href="{{ route('controle') }}">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    Controle de Usuarios
                </a>
            </li>
            <li {{ $activeRelatório or "" }} id="ativa">
                <a href="{{ route('listarRelatorios') }}">
                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    Relatório
                </a>
            </li>
        </ul>
    </div>
</aside>
