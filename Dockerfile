FROM php:7.0.27-apache-jessie
COPY . /var/www/html/
RUN apt-get update &&\
    apt-get -y upgrade &&\
    apt-get -y install zip &&\
    apt-get -y install unzip &&\
    apt-get -y install nano &&\
    apt-get -y install git &&\
    docker-php-ext-install pdo pdo_mysql &&\
    chmod -R a+w storage/ &&\
    cd /var/www/html/ &&\
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" &&\
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" &&\
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer &&\
    php -r "unlink('composer-setup.php');" &&\
    composer install &&\
    cp .env.example .env &&\
    a2enmod rewrite &&\
   php artisan key:generate &&\
    echo '<ifModule mod_rewrite.c>' >> /etc/apache2/apache2.conf &&\
    echo 'RewriteEngine On' >> /etc/apache2/apache2.conf &&\
    echo '</ifModule>' >> /etc/apache2/apache2.conf &&\
    sed -i '/www/,/Directory/ {s/<None>/All/}' /etc/apache2/apache2.conf &&\
    sed -i '/html/ c\        DocumentRoot /var/www/html/public' /etc/apache2/sites-available/000-default.conf
