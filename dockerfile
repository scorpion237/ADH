FROM php:8.3-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpq-dev \
    libzip-dev

# Extensions PHP
RUN docker-php-ext-install pdo pdo_pgsql zip

# Installation Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Installation Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Dépendances JS + build Vite
RUN npm install
RUN npm run build

# Permissions Laravel
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

//CMD sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"