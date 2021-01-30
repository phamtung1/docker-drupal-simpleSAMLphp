# Drupal (8.9.x, 9.x) with simpleSAMLphp MultiAuth - Docker Example

An example for integrating simpleSAMLphp with Drupal using Docker.

Packages:
- Drupal 8.9.13 (released in January 2021)
- simpleSAMLphp Authentication 3.2
- Drush 10.3 (optional)
- cirrusidentity/simplesamlphp-module-authoauth2 (https://github.com/cirrusidentity/simplesamlphp-module-authoauth2)


# Installation

1. Open *docker-compose.yaml* file:
2. Update the *GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, FACEBOOK_CLIENT_ID, FACEBOOK_CLIENT_SECRET* environment variables with your valid values.
3. Run the following command:
    

        docker-compose up -d

    
    It will build the drupal image in the same directory and start containers.

4. Open drupal site at http://localhost:8080.

# Usage

1. Follow the steps to install Drupal (check the DB config in *docker-compose.yaml* file).

<img style="max-width:500px" src="https://raw.githubusercontent.com/phamtung1/docker-drupal-simpleSAMLphp/master/screenshots/setup-drupal-db-config.png">

2. Install *simpleSAMLphp* module (go to */admin/modules*).
3. Go to */admin/config/people/simplesamlphp_auth*, at "Basic settings" tab:
    - Check "Activate authentication via SimpleSAMLphp" option.
    - Type "**example-multi**" for "Authentication source for this SP" field.
    - Click Save.

<img style="max-width:500px" src="https://raw.githubusercontent.com/phamtung1/docker-drupal-simpleSAMLphp/master/screenshots/simplessamlphp-config1.png">

4. Go to "User info and syncing" tab:
    - Type "**email**" for the first three inputs.
    - Click Save.

<img style="max-width:500px" src="https://raw.githubusercontent.com/phamtung1/docker-drupal-simpleSAMLphp/master/screenshots/simplessamlphp-config2.png">

5. Now you can go to the login page and try using simpleSAML.

# Testing

This example uses "example-userpass" authentication with the following account: 

    Username: student
    Password: 123

You can change these config in *authsources.php* file.

# Configuration

To config https, go to config.php file:

    // Base URL
    $config['baseurlpath'] = 'http://'. $host .'/simplesaml/';

just change "http" to "https".