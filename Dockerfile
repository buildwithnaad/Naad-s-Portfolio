# =============================
# ✅ UPDATED Dockerfile (Node 20 + PHP + Apache)
# =============================

FROM node:20-slim as node

WORKDIR /app

# Copy package files and install Vite deps
COPY package*.json ./
RUN npm install && npm run build

# =============================
# ✅ Apache + PHP image with Composer
# =============================
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update \
    && apt-get install -y libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app files
COPY . /var/www/html

# Copy Vite build from node container
COPY --from=node /app/public/build /var/www/html/public/build

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose default Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
