# Drupal (8.9.x, 9.x) with simpleSAMLphp - Docker Example

An example for integrating simpleSAMLphp with Drupal using Docker.

Packages:
- Drupal 8.9.13 (released in January 2021)
- simpleSAMLphp Authentication 3.2
- drush 10.3 (optional)
- cirrusidentity/simplesamlphp-module-authoauth2 (https://github.com/cirrusidentity/simplesamlphp-module-authoauth2)


# Usage
* Open docker-compose.yaml file:
* Update the GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, FACEBOOK_CLIENT_ID, FACEBOOK_CLIENT_SECRET variables with your valid values.
* Run the following command:
    
        docker-compose up -d

* Open http://localhost:8080.
* Install Drupal.
* Install simpleSAMLphp module (http://localhost:8080/admin/modules).
* Go to http://localhost:8080/admin/config/people/simplesamlphp_auth, at "Basic settings" tab:
    - Check "Activate authentication via SimpleSAMLphp" option.
    - Type "example-multi" for "Authentication source for this SP" field.
    - Click Save.
* Go to "User info and syncing" tab:
    - Type "email" for the first three inputs.
    - Click Save.


