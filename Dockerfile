FROM php:8.3-fpm

# Update packages and install composer and PHP extensions
RUN apt-get update && \
    apt-get install -y git unzip libz-dev libssl-dev libgrpc-dev && \
    pecl install grpc && \
    docker-php-ext-enable grpc && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install PHP dependencies
RUN composer install

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
