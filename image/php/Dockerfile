FROM ubuntu:focal
RUN apt-get update && apt install apt-transport-https lsb-release ca-certificates wget software-properties-common curl gnupg unzip -y 

RUN add-apt-repository ppa:ondrej/php && \
    apt update && \
    apt install php8.2 php8.2-fpm php8.2-common php8.2-dev php8.2-mysql php8.2-zip php8.2-mbstring php8.2-intl php8.2-curl -y

RUN sed -i 's/;pm.status_listen = 127.0.0.1:9001/pm.status_listen = 0.0.0.0:9000/g' /etc/php/8.2/fpm/pool.d/www.conf

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && apt install git -y
    
WORKDIR /app

ENTRYPOINT service php8.2-fpm start && bash
