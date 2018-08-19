<template>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-responsive" href="">
                    Locavideos
                </a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg>
                        {{ linksCabecalho }}
                        <!-- Usuário -->
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Sair
                            </a>
                        </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        data: {
            linksCabecalho: {
                locaVideos: "/filme"
            }
        }
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
