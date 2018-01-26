# Sistema de locadora de video

## Trabalho de Engenharia de Software

O trabalho foi criado no padrão MVC, foi usada um Framework chamado laravel, que é muito conhecido na comunidade WEB, foi ultilizado tambm uma maquina virtual disponibilizada pela própia equipe do laravel, onde não há necessidade de instalar nenhum outro software porque a maquina já vem totalmente configurada para rodar o laravel ela tem três versões do PHP que são: 5.6, 7.0, 7.1 e 7.2, para mais informacoes sobre os outros softwares usada fazer perquisar na página do [Laravel Homestead](https://laravel.com/docs/5.5/homestead), ultilizamoso [MySQL WorkBench](https://www.mysql.com/products/workbench/) apenas para fazer o diagrama ER do sistema, pois o laravel contém uma funcionalidade chamada migrations, onde podemos fazer alteracoes do banco de dados e recria-lo novamente no própio codigo fonte do PHP, sendo assim é só rodar o comando "php artisan migrate" no terminal que você tera um banco de dados novinho e pronto para rodar aplicação, mas para isso é preciso apenas criar o banco com o nome "locadora", e o resto fica por conta do comando citado antes.

### Programas Usados:

- [Framework Laravel 5.5](https://laravel.com/docs/5.5).

- [MySQL WorkBenk](https://www.mysql.com/products/workbench/), para fazer o diagrama ER.

- [Vagrant](https://www.vagrantup.com/), o vagrant é uma ferramenta para criação de ambiente virtual.

- [Laravel Homestead](https://laravel.com/docs/5.5/homestead), maquina virtual que utilizo no vagrant, criada pela equipe do laravel.

### Diagrama ER da aplicação:

Veja que o Diagrama ER da aplicação é bem simples, porem na hora de implementar a funcionalidade exite várias validacoes em cima do software.

![Alt text](ER_ORIGINAL.png?raw=true "Title")
