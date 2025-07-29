# Stage 1: Build assets using Node 20
FROM node:20 AS build

WORKDIR /app

# Copy package files for dependency installation
COPY package.json package-lock.json ./
RUN npm install

# Copy Vite config and Laravel frontend resources
COPY vite.config.js . 
COPY resources ./resources
COPY public ./public

# Build Vite assets
RUN npm run build


# Stage 2: Laravel + Apache with PHP
FROM php:8.2-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install required PHP extensions and Apache modules
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring exif pcntl bcmath \
    && a2enmod rewrite && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy Apache config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app
COPY . .

# Copy Vite build files from stage 1
COPY --from=build /app/public/build ./public/build

# Run composer install
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

EXPOSE 80
