# Easy Moto

# Instalação

1 - Coloque o projeto em uma pasta do seu servidor web local
2 - Execute o SQL que esta no arquivo scripts.sql
3 - Acesse o arquivo .env e altere as linhas DB_USERNAME e DB_PASSWORD

# Execução

1 - Através da linha de comando, acesse a raiz do projeto e execute: php artisan serve
2 - Acesse o projeto na url informada pelo terminal, geralmente é http://localhost:8000

# Teste

1 - Crie um usuário do tipo cliente
2 - Cadastre um ou mais cartões
3 - Crie um usuário do tipo motoboy
4 - Com o usuário do tipo cliente, solicite um novo serviço
5 - Após cadastrar o cliente será notificado qual motoboy foi selecionado
6 - No usuário do tipo motoboy, o status dele estará "indisponivel" e o serviço aparecerá na sua lista com o status "em andamento"
7 - Após o motoboy concluir o serviço, este clica no botão "Finalizar serviço", então o status do serviço fica "Finalizado"
8 - Quando o serviço é finalizado o cliente pode avaliar o motoboy, através do botão que aparece nas ações do serviço finalizado

