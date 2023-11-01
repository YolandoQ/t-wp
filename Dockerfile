# Use a imagem do WordPress como base
FROM wordpress:latest

# Instalação das dependências necessárias para o WP-CLI
RUN apt-get update && apt-get install -y less && rm -rf /var/lib/apt/lists/*

# Download e instalação do WP-CLI
RUN curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x /usr/local/bin/wp
