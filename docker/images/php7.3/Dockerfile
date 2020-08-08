FROM ubuntu:18.04

# Переключаем Ubuntu в неинтерактивный режим — чтобы избежать лишних запросов
ENV DEBIAN_FRONTEND noninteractive

# Обновляем список пакетов
RUN apt-get update
RUN apt-get install -y software-properties-common apt-utils language-pack-en-base
RUN LC_ALL=en_US.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt-get update

# Устанавливаем пакеты
RUN apt-get install -y ssh git make curl php7.3 php7.3-fpm php7.3-opcache php7.3-apcu php7.3-bcmath php7.3-curl php7.3-gd php7.3-intl php7.3-imagick php7.3-mbstring php7.3-memcached php7.3-pgsql php7.3-xml php7.3-xmlrpc php7.3-zip

RUN apt-get clean

RUN mkdir -p /run/php

#Настраиваем php
RUN sed -i '/^pm.max_children/c pm.max_children = 40' /etc/php/7.3/fpm/pool.d/www.conf
RUN sed -i '/^pm.start_servers/c pm.start_servers = 30' /etc/php/7.3/fpm/pool.d/www.conf
RUN sed -i '/^pm.min_spare_servers/c pm.min_spare_servers = 29' /etc/php/7.3/fpm/pool.d/www.conf
RUN sed -i '/^pm.max_spare_servers/c pm.max_spare_servers = 31' /etc/php/7.3/fpm/pool.d/www.conf
RUN sed -i -e "s/listen\s*=\s*\/run\/php\/php7.3-fpm.sock/listen = [::]:9000/g" /etc/php/7.3/fpm/pool.d/www.conf
RUN sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php/7.3/fpm/php-fpm.conf

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

EXPOSE 9000

CMD ["php-fpm7.3"]
