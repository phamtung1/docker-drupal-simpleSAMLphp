FROM drupal:8.9.13-apache-buster

WORKDIR /opt/drupal

# unlimit php memory to install simpleSAML
RUN cd /usr/local/etc/php/conf.d/ && \
   echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# Install modules
RUN composer require 'drush/drush:^10.3' && \
    composer require 'drupal/simplesamlphp_auth:^3.2' && \
    composer require 'cirrusidentity/simplesamlphp-module-authoauth2'

# Enable module examlauth for testing
RUN touch vendor/simplesamlphp/simplesamlphp/modules/exampleauth/enable

# Copy .htaccess file to web/
COPY ./.htaccess web/.htaccess
# RUN cp -f temp/.htaccess web/.htaccess

# Create a simplesaml link
RUN ln -sf /opt/drupal/vendor/simplesamlphp/simplesamlphp/www /opt/drupal/web/simplesaml

# Copy config files
COPY --chown=www-data:www-data ./simplesamlphp_config/ vendor/simplesamlphp/simplesamlphp/config

EXPOSE 80