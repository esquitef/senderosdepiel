FROM php:8.4-cli

# Instalar dependencias del sistema (incluye Node.js y npm)
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

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar TODO el código (NO solo los configs)
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Instalar dependencias de Node y compilar assets
RUN npm install && npm run build

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Enlace simbólico para storage
RUN php artisan storage:link

# Cachear configuración (opcional, acelera la app)
RUN php artisan config:cache

# Exponer puerto
EXPOSE 8080

# Iniciar Laravel con puerto dinámico
CMD sh -c "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"