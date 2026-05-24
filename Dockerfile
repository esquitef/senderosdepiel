FROM php:8.3-cli

# Instalar dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias de PHP (sin dev)
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Configurar permisos para storage y cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Exponer el puerto que usa Laravel (por defecto 8000, pero Render usará el 8080)
EXPOSE 8080

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8080