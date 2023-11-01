# WordPress - Criação de plugins

## Contexto
Desenvolver dois plugins para mapear cliques em botão.

## Funcionalidades

- Plugin de Shortcode do Botão: Adiciona um botão personalizado a ser utilizado via shortcode.
- Plugin de Relatório de Cliques: Disponibiliza os dados de cliques registrados no banco de dados WordPress.

## Tecnologias

- WordPress - Gerenciador de Conteúdo mais popular e utilizado para o desenvolvimento de sites em todo o mundo.
- MySQL - Um sistema open-source de gerenciamento de base de dados relacional.
- Docker - O Docker permite que você separe seus aplicativos de sua infraestrutura para que você possa entregar software rapidamente.

## Instalação

##### Requisito obrigátorio
Antes de tudo você precisa ter o docker e o docker-compose e também o git.

Caso não tenha instalado, aqui alguns links de referência:
- Aqui encontrar os passos para instalação do Docker => https://docs.docker.com/get-docker/ 
- Aqui encontrar os passos para instalação do Docker Compose => https://docs.docker.com/compose/ 
- Aqui encontrar os passos para instalação do git => https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

##### Clonar o Projeto

Usando o Git, em um diretório de sua preferência, clone o projeto:

```sh
git clone https://github.com/YolandoQ/t-wp.git
```

##### Iniciar os Serviços
Certifique-se de ter a pasta "db_data" criada na raiz do projeto para persistência dos dados do MySQL (Opcional).
Em seguida, com o Docker Compose instalado, execute o seguinte comando na raiz do projeto:

```sh
docker-compose up -d
```

##### Após a execução, a aplicação estará disponível na porta configurada no arquivo docker-compose.yml. 
Se não houve alteração, acesse a aplicação pelo seguinte endereço: http://localhost:8080/.
Para configurar o WordPress, siga os passos usuais, defina o login e senha no painel de administração e ative os plugins na seção de plugins (http://localhost:8080/wp-admin)

```sh
Plugin 1: Clicks Registration(Registra cliques em um botão e armazena no banco de dados WordPress.) 
Plugin 2: Clicks Report(Disponibiliza dados dos clicks salvos no banco de dados WordPress.)
```

###### Testar o Shortcode do Botão

Acesse a área de páginas e edite uma página de sua preferência. Adicione o shortcode do botão conforme mostrado abaixo:

```sh
[custom_button]
```

Salve as alterações, visualize a página e teste o botão.

##### Visualizar resultados

Após ativar o plugin "Clicks Report", uma opção "Relatório de Cliques" estará disponível no painel de administração. Esta opção lista as informações dos cliques registrados.

###### Testar comando WP-CLI

Para verificar o relatório de cliques utilizando o comando WP-CLI, utilize o seguinte comando no terminal:

```sh
docker exec wordpress_app wp click-report --allow-root
```

O relatório será exibido logo abaixo.
