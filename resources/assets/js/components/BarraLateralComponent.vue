<template>
    <aside>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <ul class="nav menu">
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            Lista de Filmes
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
                            Cadastrar Filme
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            Controlar Genero
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            Lista de Clientes
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                            Preco e Desconto
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Controle de Usuarios
                        </a>
                    </li>
                    <li id="ativa">
                        <a href="">
                            <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            Relatório
                        </a>
                    </li>
                </ul>
        </div>
    </aside>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

