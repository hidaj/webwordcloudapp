FROM php:7.4-apache
COPY src/ /var/www/html/

#RUN sed -ri 's/^www-data:x:82:82/www-data:x:1000:50:/' /etc/passwd
#RUN chown -R www-data:www-data /var/www/html
#copying over my trusted-users file so that apache can send mail through the browser adn sendmail doesn't have to create a trusted-users file
COPY src/trusted-users /etc/mail/

#install sendmail and other formatting packages
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev sendmail cron
#dokcer doesn't define the path for sendmail so this is to create the php .ini file to do this
RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini
#need to restart the sendmail service to do this - this needs to take effect in the current layer while building so is input into docker-php-entrypoint
RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint
#defining qualified host name foe sendmail - again in the current layer while building
RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint
#restart sendmail for changes to host names to take effect
RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint
#remove install 'bulk' from the docker image and subsequent containers
RUN rm -rf /var/lib/apt/lists/*
#use root priviledges to change permissions on files and folders and edit user groups - not available for not root users
USER root
#add executable priviledges for index.php - for users and groups
RUN chmod ug+x /var/www/html/index.php
#give all access permissions to the mqueue-client -needed for sendmail
RUN chmod 777 /var/spool/mqueue-client/
#sendmail requires email users to be root or share the group id of smmsp - www-data is name of the apache user
RUN groupmod -og 102 www-data

RUN chown -R www-data:www-data /var/www/html

RUN chmod +x /var/www/html/*

COPY loggingtasks-crontab /etc/cron.d/loggingtasks-crontab

RUN chmod 0644 /etc/cron.d/loggingtasks-crontab && crontab /etc/cron.d/loggingtasks-crontab 

RUN sed -i '/#!\/bin\/sh/a/etc/init.d/cron start' /usr/local/bin/docker-php-entrypoint






#RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

#RUN cat /usr/local/etc/php/php.ini-development

#RUN cat /usr/local/etc/php/php.ini-production

#RUN echo /usr/local/etc/php/conf.d


#RUN useradd newuser

#RUN echo 'newuser:newpasword' | chpasswd

#COPY --chown=newuser:newuser src/ /var/www/html/

#WORKDIR /var/www/html/

#USER newuser

#WORKDIR /home/newuser

#RUN chown -R newuser:root /var/www/html/ 



