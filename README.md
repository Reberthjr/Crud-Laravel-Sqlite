Passo a Passo para Rodar o Projeto

Clone o Repositório

Primeiro, faça o clone do repositório para a sua máquina:
git clone https://github.com/Reberthjr/Crud-Laravel-Sqlite.git

cd Crud-Laravel-Sqlite

Instale as Dependências

Para instalar as dependências do Laravel, execute o comando:
composer install
Configure o Arquivo .env

Crie o arquivo .env com base no arquivo de exemplo:
cp .env.example .env
Abra o arquivo .env em um editor de texto e defina a conexão com o banco de dados SQLite:

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

Observação: 
Caso deseje usar outro database, substitua 'database/database.sqlite' pelo caminho completo do seu arquivo SQLite. 
Agora, você pode iniciar o servidor local com:

php artisan serve
