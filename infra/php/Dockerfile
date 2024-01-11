FROM php:8.2-fpm

# 必要なパッケージやPHPの拡張モジュールをインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mysqli

WORKDIR /var/www/html

# index.php は docker-compose.yml でマウントされるため、ここではCOPYは不要です
