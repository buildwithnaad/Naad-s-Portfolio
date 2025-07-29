# Stage 1: Build assets using Node 20
FROM node:20 AS build

WORKDIR /app

# Copy package files first for better caching
COPY package.json package-lock.json ./
RUN npm install

# Copy remaining files for build
COPY vite.config.js .
COPY resources ./resources
COPY public ./public

RUN npm run build

# Stage 2: Laravel + Apache with PHP
FROM php:8.2-apache

# Install required PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring exif pcntl bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app
COPY . .

# Copy built assets from build stage
COPY --from=build /app/public/build ./public/build

# Install composer dependencies (remove if you run composer install before building)
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# RUN composer install --no-dev --optimize-autoloader

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80