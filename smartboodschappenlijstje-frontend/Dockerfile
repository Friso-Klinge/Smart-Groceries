FROM php:8.4-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    unzip git curl nodejs npm \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install
RUN npm install
RUN npm run build

RUN cp .env.example .env || true
RUN php artisan key:generate

EXPOSE 8000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000