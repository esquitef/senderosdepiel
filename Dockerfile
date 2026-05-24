FROM php:8.4-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar archivos de configuración primero (mejor cache)
COPY composer.json composer.lock package.json package-lock.json vite.config.js ./

# Instalar dependencias PHP y Node
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN npm install

# Copiar el resto del código
COPY . .

# Compilar assets (Tailwind + Vite)
RUN npm run build

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

RUN php artisan storage:link
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8080
CMD sh -c "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"