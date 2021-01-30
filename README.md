# Drupal (8.9.x, 9.x) with simpleSAMLphp - Docker Example

An example for integrating simpleSAMLphp with Drupal using Docker.

Packages:
- Drupal 8.9.13 (released in January 2021)
- simpleSAMLphp Authentication 3.2
- Drush 10.3 (optional)
- cirrusidentity/simplesamlphp-module-authoauth2 (https://github.com/cirrusidentity/simplesamlphp-module-authoauth2)


# Usage
1. Open *docker-compose.yaml* file:
2. Update the *GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, FACEBOOK_CLIENT_ID, FACEBOOK_CLIENT_SECRET* environment variables with your valid values.
3. Run the following command:
    
        docker-compose up -d

4. Open http://localhost:8080.
5. Install Drupal (check the DB config in *docker-compose.yaml*_* file)
6. Install *simpleSAMLphp* module (go to http://localhost:8080/admin/modules).
7. Go to http://localhost:8080/admin/config/people/simplesamlphp_auth, at "Basic settings" tab:
    - Check "Activate authentication via SimpleSAMLphp" option.
    - Type "**example-multi**" for "Authentication source for this SP" field.
    - Click Save.
8. Go to "User info and syncing" tab:
    - Type "**email**" for the first three inputs.
    - Click Save.
9. Now you can go to the login page and try using simpleSAML.



