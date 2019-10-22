# Desafio Vikings

Este projeto foi criado para atender o desafio proposto no processo de seleção da equipe [Vikings](https://github.com/p21sistemas/vikings/blob/master/index.md)

## Construção

Este sistema foi construindo ulizando a stack PHP, JS, CSS e HTML.
A estrutura, que se assemelha a um microframework, foi construída apenas em PHP e foi baseado em padrões amplamente utilizados.

### Para o perfeito funcionamento desta aplicação, é fundamental que:

1. Esteja em um ambiente com:
	1.1 Apache 2
	1.2 PHP Versão 7.2 ou superior
	1.3 MySql v. 5.7 ou superior
	1.4 Preferencialmente com um dos OS que foram usados no desenvolvimento / testes deste App: Windows 10 ou Linux Mint
    1.5 Composer (para a instalação das dependências e do autoload PSR-4)
	
2. O mod_rewrite do Apache esteja habilitado
	2.1 Em caso de dúvidas pode seguir o tutorial em http://www.devfuria.com.br/linux/apache-habilitar-mod_rewrite-no-apache-mod/

```
Give examples
```

### Instalação

Após feito o download ou clone do projeto, 

* Crie um banco de dados no seu servidor MySQL
* Copie o arquivo ".env.example", renomeando para ".env" e defina os dados de configuração neste arquivo
* Execute acessando o diretório raiz da aplicação por um CLI (como CMD ou Terminal), execute os seguintes comandos:

Para instalar as dependências:

```
composer install
```

Para mapear as classes (necessário para ambiente linux):

```
composer dump-autoload -o
```

Para fazer a criação da estrutura de banco de dados e a carga inicial:
```
instalador-de-banco-de-dados
```

Após estes passos, o sistema estará pronto para uso, podendo ser acessado via browser, apontando para diretório raiz da aplicação.


## Instruções para alterações no código:

### Para criação de novas funcionalidades em controllers:

Crie uma rota no arquivo RoutesConfig.php

```
['<métodoHTTP>', '<uri>', '<classeController>@<método>', <flag de obrigação de autenticação>],
['GET', 'home', 'VikingController@inicio', true],
```
 Crie uma classe controller na pasta controllers, extendendo da classe Controller. E crie dentro desta classe um método com o mesmo nome do método indicado na rota:

 ```
<?php

namespace Viking\Controllers;

class VikingController extends Controller
{

    public function inicio()
    {
       echo "Tudo certo!";
    }
```

### Para inclusão de páginas ou partes de páginas ".php" nas views:

use os códigos:
```
<?php include appbasepath() . '/src/views/paginas/pieces/navbar.php'; ?>
```
 ou 

```
includeViewPiece('pieces/sidebar', ['teste' => 'minha var']);
```




## Desenvolvido com

* PHP
* [SwiftMailer](https://swiftmailer.symfony.com/) - Free Feature-rich PHP Mailer
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP

* JS, CSS e HTML5
* [JQuery](https://jquery.com/) - JavaScript library
* [Bootstrap](https://getbootstrap.com/) - front-end component library
* [Datatables](https://datatables.net/) - library for HTML tables
* [FontAwsome](https://fontawesome.com/) - icons
* [Summernote](https://summernote.org/) - Bootstrap WYSIWYG Editor
* [Toastr](https://codeseven.github.io/toastr/) - jquery/css notifications
* [AminLTE](https://adminlte.io/) - Admin Dashboard Template


## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versão

1.0.0

## Authors

* **Gustavo Torres** - *Initial work* - [GustavoTorres-SoftwareDeveloper](http://gustavo-torres.esy.es/)


Para inclusão de páginas ou partes de páginas ".php" nas views:
<?php include appbasepath() . '/src/views/paginas/pieces/navbar.php'; ?>
includeViewPiece('pieces/sidebar', ['teste' => 'minha var']);
