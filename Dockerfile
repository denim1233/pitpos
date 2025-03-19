FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    unzip \
    curl \
    git \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Expose port
EXPOSE 9000
