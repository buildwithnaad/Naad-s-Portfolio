# Use official PHP image with Apache
FROM php:8.2-apache

# Set working dir
WORKDIR /var/www/html

# System deps
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev nodejs npm \
    libpng-dev libonig-dev libxml2-dev \
    libpq-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd

# Enable Apache mods
RUN a2enmod rewrite

# Set Laravel's public as Apache root
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
 && echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/laravel.conf \
 && a2enconf laravel

# Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app code
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Install Node modules and build frontend (Vite)
RUN npm install && npm run build

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose web port
EXPOSE 80

# Start server
CMD ["apache2-foreground"]
