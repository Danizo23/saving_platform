# Image ya PHP 8.2 + Apache
FROM php:8.2-apache

# Weka Apache mod_rewrite (kufanikisha routing ya Laravel)
RUN a2enmod rewrite

# Install dependencies muhimu
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer kutoka official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Weka working directory
WORKDIR /var/www/html

# Copy project files zote
COPY . .

# Copy .env.example kuwa .env ili Laravel isikie environment
RUN cp .env.example .env

# Run composer install
RUN composer install --no-dev --optimize-autoloader

# Set permissions kwa storage na cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Fungua port 80 kwa apache
EXPOSE 80

# Start Laravel & Apache
CMD php artisan key:generate && apache2-foreground
