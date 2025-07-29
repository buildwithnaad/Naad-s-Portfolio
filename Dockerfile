# Stage 1: Build assets using Node 20
FROM node:20 AS build

WORKDIR /app

# Copy only the files needed for vite build
COPY package.json package-lock.json vite.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm install && npm run build

# Stage 2: Laravel + Apache with PHP
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app (excluding node_modules and vendor)
COPY . .

# Copy built vite assets
COPY --from=build /app/public/build ./public/build

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose port 80
EXPOSE 80
