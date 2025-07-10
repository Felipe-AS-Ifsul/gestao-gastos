como rodar o projeto.

abra no terminal o caminho do projeto:

cd c:/.../.../gestao-gastos

Instale as dependências do PHP:

composer install

Instale os pacotes NPM:

npm install

Compila os assets usando um dos comandos:

npm run dev
npm run build

faça as migrates:

php artisan migrate::fresh

inicia o servidor local:

php artisan serve

acesse http://localhost:8000.

faça um registro pro dashboard.
