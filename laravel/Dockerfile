FROM php:8.1.25-apache

RUN apt-get update \
    && apt-get install -y vim \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo pdo_mysql

# Suppress Apache server name warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY . /var/www/html

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Ensure permissions for the public directory
RUN chmod -R 755 /var/www/html/public
