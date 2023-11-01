# Sistema de gerenciamento de clientes
## Contexto
Desenvolver dois plugins para mapear cliques em botão.

## Funcionalidades
- plugin de shortcode de botão e plugin pra relatório de cliques no botão.

## Tecnologias
- WordPress - Gerenciador de Conteúdo mais popular e utilizado para o desenvolvimento de sites em todo o mundo
- MySQL - Um sistema open-source de gerenciamento de base de dados relacional.
- Docker - O Docker permite que você separe seus aplicativos de sua infraestrutura para que você possa entregar software rapidamente.

## Instalação

##### Requisito obrigátorio
Antes de tudo você precisa ter o docker e o docker-compose e também o git.
Caso não tenha instalado, aqui alguns links de referência:
- Aqui encontrar os passos para instalação do Docker => https://docs.docker.com/get-docker/ 
- Aqui encontrar os passos para instalação do Docker Compose => https://docs.docker.com/compose/ 
- Aqui encontrar os passos para instalação do git => https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

##### Clone o projeto
Com o git instalado e em um diretório da sua escolha, baixe o projeto:

```sh
git clone https://github.com/YolandoQ/t-wp.git
```

##### Suba o serviço
###### Verifique se a pasta "db_data" está criada na raiz do projeto, ela vai servir para persistência dos dados do MySQL(Opcional).

Em seguida, com o Docker-compose instalado, execute esse comando na raiz do projeto:

```sh
docker-compose up -d
```

##### Feito isso a aplicação roda na porta configurada no docker-compose.yml, vamos ativar os plugins.
###### Se não tiver alterado nada é so acessar a aplicação nessa url: http://localhost:8080/

Entre na conta local através da url http://localhost:8080/wp-login.php

```sh
login: t-wp@t-wp.t-wp
senha: t-wp-yolando
```

###### Ative os plugins na opção de plugins(http://localhost:8080/wp-admin)

```sh
Plugin 1: Clicks Registration(Registra cliques em um botão e armazena no banco de dados WordPress.) 
Plugin 2: Clicks Report(Disponibiliza dados dos cliks salvos no banco de dados WordPress.)
```

###### Com os plugins ativados, vamos testar o shortcode do botão

Acesse a aba de páginas e edite uma página de sua escolha(Na página de exemplo existente o shortcode já está adicionado).
Então adicione o shortcode onde desejar da seguinte forma:

```sh
[custom_button]
```

Feito isso, salve as alterações, visualize a página e teste os clique no botão.

##### Visualizar resultados
No painel admin uma opção de relatório de cliques será disponibilizada após a ativação do plugin "Clicks Report", ele lista as informações dos clicks executados.

###### Testando comando WP-CLI

Para testar com comando do WP-CLI, utilize esse comando no terminal:

```sh
docker exec -it wordpress_app bash
```

Agora dentro do container do WordPress(necessária ativação do plugin "Clicks Report"), execute: 

```sh
wp click-report --allow-root
```

O relatório será exibido no terminal.
