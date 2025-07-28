FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    npm \
    nodejs \
    vim

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Ensure Node is installed correctly
RUN node -v && npm -v

# Install Laravel & Node dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install

# Build Frontend (Vite)
RUN npm run build

# Laravel optimization
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

# Fix Permissions (very important for storage/logs)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Expose the port
EXPOSE 8000

# Serve Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
