FROM ubuntu:latest

RUN apt update && apt upgrade -y && DEBIAN_FRONTEND=noninteractive apt install -y apache2 php php-mysql nano 
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
	
RUN a2enmod ssl
RUN a2enmod rewrite

RUN ln -s /etc/apache2/sites-available/che2.conf /etc/apache2/sites-enabled

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY che2.conf /etc/apache2/sites-available


RUN composer create-project laravel/laravel=5.8 che2 --prefer-dist /var/www/html
RUN a2dissite 000-default.conf
RUN a2ensite che2.conf

EXPOSE 80 443

CMD apachectl -DFOREGROUND
