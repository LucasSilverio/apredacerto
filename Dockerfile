FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql 


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



WORKDIR /var/www