# Step 1: Base Image with PHP & Composer
FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Step 2: Install System Dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    npm \
    nodejs \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Step 3: Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Step 4: Copy Laravel Files
COPY . .

# Step 5: Install PHP Dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Step 6: Install Node Packages & Build Assets
RUN npm install && npm run build

# Step 7: Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Step 8: Apache Config
RUN echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Step 9: Expose port
EXPOSE 80

# Step 10: Start Apache
CMD ["apache2-foreground"]
