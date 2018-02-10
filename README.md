# Sistema de locadora de video

## Trabalho de Engenharia de Software

O trabalho foi criado no padrão MVC ou seja o software foi todo implementado com "ORIENTAÇÃO À OBJETOS", foi usada um Framework chamado laravel, que é muito conhecido na comunidade WEB, foi ultilizado tambm uma maquina virtual disponibilizada pela própia equipe do laravel, onde não há necessidade de instalar nenhum outro software porque a maquina já vem totalmente configurada para rodar o laravel ela tem três versões do PHP que são: 5.6, 7.0, 7.1 e 7.2, para mais informacoes sobre os outros softwares usada fazer perquisar na página do [Laravel Homestead](https://laravel.com/docs/5.5/homestead), ultilizamoso [MySQL WorkBench](https://www.mysql.com/products/workbench/) apenas para fazer o diagrama ER do sistema, pois o laravel contém uma funcionalidade chamada migrations, onde podemos fazer alteracoes do banco de dados e recria-lo novamente no própio codigo fonte do PHP, sendo assim é só rodar o comando "php artisan migrate" no terminal que você tera um banco de dados novinho e pronto para rodar aplicação, mas para isso é preciso apenas criar o banco com o nome "locadora", e o resto fica por conta do comando citado antes.

### Requisitos do Sistema

Abaixo estão listados todos os requisitos do sistema, quase todos foram implementados no software porém faltaram alguns, pois ao terminar o software fomos questionados que estava faltando alguns requisitos, então apenas os acrescentamos na lista de requisitos e fizemos o caso de uso deles.

- Alugar Filme
- Pagar Filme
- Devolver Filme
- Cadastrar Administrador
- Alterar Administrador
- Alterar Senha do Administrador
- Recuperar Senha do Administrador
- Exclui Administrador
- Cadastrar Cliente
- Alterar Cliente
- Excluir Cliente
- Cadastro Filme
- Alterar Filme
- Excluir Filme
- Listar Clientes
- Listar Filmes
- Listar Administradores
- Cadastrar Preço 
- Alterar Preço dos Filmes
- Total de Filmes Alugados
- Total de Clientes Cadastrados
- Historico de Venda Semanal
- Historico de Venda Mensal
- Cadastrar Genero
- Deletar Genero

### Programas Usados:

- [Framework Laravel 5.5](https://laravel.com/docs/5.5).

- [MySQL WorkBenk](https://www.mysql.com/products/workbench/), para fazer o diagrama ER.

- [Vagrant](https://www.vagrantup.com/), o vagrant é uma ferramenta para criação de ambiente virtual.

- [Laravel Homestead](https://laravel.com/docs/5.5/homestead), maquina virtual que utilizo no vagrant, criada pela equipe do laravel.

### Guia do Frameork

Esse é um dos melhores e mais completos frameworks para WEB, então para não ficar perdido em meio ao monte de pastas, vou mostrar o modelo MVC, ou seja onde fica cada pasta e cada arquivo criado da aplicação.

Abaixo sera listado todos os diretorios onde foi implementado parte do software e dentro destas pastas e ou subpastas ficam todos os arquivos PHP ultilizados no software.

- C do MVC onde fica todos os controllers criados na aplicação: app/Http/Controllers
- M do MVC onde fica todas as Models criadas na palicação: app/Models
- V do MVC onde fica todas as views criadas da aplicação: resources/views

- Migrations, configuracao das tabelas do banco de dados: database/migrations


### Diagrama ER da aplicação:

Veja que o Diagrama ER da aplicação é bem simples, porem na hora de implementar a funcionalidade exite várias validacoes em cima do software.

![Alt text](Modelagens/ER_ORIGINAL.png?raw=true "Diagrama ER")


### Diagrama de Classes da aplicação:

O diagrama de classes também é bem simples e olhando para ele da pra entender como toda aplicação funciona no sistema real pode ser que eu tenha alterado o nome de algumas classes e de alguns métodos mas é tudo igual,
repare também que o diagrama de classes no modelo MVC a maioria das classes viram Models, porque é la que fica toda a regra de negocio.


![Alt text](Modelagens/diagrama_classes.png?raw=true "Diagrama de Classes")

### Algumas imagens do Sistema

Abaixo estão listados algumas imagens do sistema

![Alt text](imagens_do_sistema/tela_login.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_criar_Adiministrador.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_recuperar_senha.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_inicial_sistema.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_visualizar_filme.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_cadastrar_filme.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_incluir_preco_desconto.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_cadastrar_filme.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_controle_usuarios_do_sistema.jpg?raw=true)
![Alt text](imagens_do_sistema/tela_de_relatorios.jpg?raw=true)
![Alt text](imagens_do_sistema/telatorio_semanal.jpg?raw=true)
![Alt text](imagens_do_sistema/alugar_filmes.jpg?raw=true)