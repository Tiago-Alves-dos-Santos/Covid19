<!--
Readme template -> https://github.com/othneildrew/Best-README-Template
## Guards - Table - Model

## Sessões


## Cokkies


## Z-index 

-->

<a name="readme-top"></a>
<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="public/img/favicon/favicon_100px.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">COVID - 19</h3>

  <p align="center">
      Sistema consumindo API sobre o covid-19 no Brasil
    <!-- <br />
    <a href=""><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="">View Demo</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues">Report Bug</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues">Request Feature</a> -->
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Menu</summary>
  <ol>
    <li>
      <a href="#sobre-o-projeto">Sobre</a>
      <ul>
        <li><a href="#:computer:tecnologias-utilizadas">Tecnologias Utilizadas</a></li>
      </ul>
    </li>
    <li><a href="#funcionalidades">Funcionalidades</a></li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- SOBRE -->
## Sobre o projeto

<!-- Colocar imagem aq -->

There are many great README templates available on GitHub; however, I didn't find one that really suited my needs so I created this enhanced one. I want to create a README template so amazing that it'll be the last one you ever need -- I think this is it.

Here's why:
* Your time should be focused on creating something amazing. A project that solves a problem and helps others
* You shouldn't be doing the same tasks over and over like creating a README from scratch
* You should implement DRY principles to the rest of your life :smile:

Of course, no one template will serve all projects since your needs may be different. So I'll be adding more in the near future. You may also suggest changes by forking this repo and creating a pull request or opening an issue. Thanks to all the people have contributed to expanding this template!

Use the `BLANK_README.md` to get started.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## :computer: Tecnologias Utilizadas
1. FRONT-END
    * HTML 5
    * CSS 3
    * BOOTSTRAP ^5.2.3
    * BLADE
    * JQUERY 3.7
    * NODE 16.14.2
    * NPM 8.5.0
2. BACK-END
    * PHP 7.4.9
    * LARAVEL 8

## :hammer: Funcionalidades

- [x] Consulta de dados relacionados ao Covid-19 no Brasil
- [x] Compartilhamento de informações pelo whatsapp web
- [x] Multi linguagens suportadas
    - [x] English
    - [x] Português-BR
    - [ ] Português



<!-- ~~~Banco
* Ban
~~~ -->
## Inicialização
1. Certifique-se de ter instalado na sua máquina o php e node(npm) correto, se usa docker verficar a imagem
2. Faça o 
    ~~~git
        git clone url_projeto -b main
    ~~~
3. Duplique o arquivo `.env.example` e retire o `.example`
4. Configure as variaveis de conexao com o banco de dados
5. Execute 
    ~~~php
        composer install 
    ~~~
6. Caso queira fazer mudanças com o sass execute 
    ~~~js
        npm install
    ~~~ 
    em seguida
    ~~~js
        npm run watch
    ~~~
7. Execute 
   ~~~php
        php artisan key:generate 
   ~~~
8. Execute 
    ~~~
        php artisan serve
    ~~~

## Implementações Futuras
 :construction:  Sem previsão!  :construction:

## Colaboradores
 --- **N/A** ---

## :eyes: Status Projeto
:heavy_check_mark:  v1.1.0


## :movie_camera: Gif de demonstração

<img src="public/img/covid19.gif" />

### Observação
 Link da API: https://covid19-brazil-api.vercel.app/
