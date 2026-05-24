FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Configurar PHP-FPM
RUN echo "cgi.fix_pathinfo=0" >> /usr/local/etc/php/conf.d/docker.ini

# Crear directorio para la app
WORKDIR /var/www/html

# Copiar código
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Exponer puertos
EXPOSE 80

# Script de inicio
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]