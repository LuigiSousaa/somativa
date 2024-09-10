# Instruções para Execução do Projeto 

Siga os passos abaixo para configurar e rodar o projeto:

## Configuração do Backend

1. **Abra um terminal e navegue até a raiz do projeto.**

2. Execute os seguintes comandos:
    ```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    ```

## Configuração do Frontend

1. **Abra um segundo terminal e navegue até a raiz do projeto.**

2. Execute os seguintes comandos:
    ```bash
    npm install bootstrap @popperjs/core
    npm install sass
    npm run dev
    ```

