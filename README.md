# Receitopedia
Um site de receitas no laravel

Instalação:
Requisitos:

XAMPP / Apache e MySQL
Composer (Composer install)
# Etapa 1
Download XAMPP (Windows, Linux, macOS)
Download Composer (Windows, Linux, macOS)
Colocar receitopedia-main dentro de /xampp/htdocs

# Etapa 2
Criar o banco de dados no PHPMyAdmin / CREATE DATABASE receitopedia;
Colocar o banco de dados pronto na parte de sql do phpmyadmin ou fazer o comando php artisan migrate

# Etapa 3
iniciar o apache e o mysql no xampp
entrar em http://127.0.0.1:8000 ou em http://localhost/receitopedia/public


# Comandos no geral

composer install
copy .env.example .env
php artisan key:generate

php artisan migrate  (ou importe o banco SQL manualmente)

php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan optimize:clear
composer dump-autoload
php artisan serve
