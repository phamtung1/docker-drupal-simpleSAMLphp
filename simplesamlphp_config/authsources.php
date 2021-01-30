<?php

$config = [
	'example-multi' => array(
		'multiauth:MultiAuth',

		/*
		 * The available authentication sources.
		 * They must be defined in this authsources.php file.
		 */
		'sources' => array(
			'example-userpass' => array(
				'text' => array(
					'en' => 'Log in using a SAML SP'
				),
				'css-class' => 'SAML',
			),
			'google' => array(
				'text' => array(
					'en' => 'Log in using Google'
				),
			),
			'facebook' => array(
				'text' => array(
					'en' => 'Log in using Facebook'
				),
			),
		),
	),
	
    // This is a authentication source which handles admin authentication.
    'admin' => [
        // The default is to use core:AdminPassword, but it can be replaced with
        // any authentication source.
        'core:AdminPassword',
    ],
	 'google' => [
		'authoauth2:OAuth2',
		'template' => 'GoogleOIDC',
		'clientId' => getenv('GOOGLE_CLIENT_ID'),
		'clientSecret' => getenv('GOOGLE_CLIENT_SECRET'),
		'scopes' => 'email',
        'scopeSeparator' => ' ',
		'attributePrefix' => '',
	],

	'facebook' => [
		  'authoauth2:OAuth2',
        // *** Facebook endpoints ***
        'urlAuthorize' => 'https://www.facebook.com/dialog/oauth',
        'urlAccessToken' => 'https://graph.facebook.com/oauth/access_token',
        // Add requested attributes as fields
        'urlResourceOwnerDetails' => 'https://graph.facebook.com/me?fields=id,name,first_name,last_name,email',
        // *** My application ***
        'clientId' => getenv('FACEBOOK_CLIENT_ID'),
        'clientSecret' => getenv('FACEBOOK_CLIENT_SECRET'),
        'scopes' => 'email',
        // *** Optional ***
        // Custom query parameters to add to authorize request
        'urlAuthorizeOptions' => [
            // Force use to reauthenticate
           // 'auth_type' => 'reauthenticate',
        ],
	   ],
	   
    /*
    'facebook' => [
        'authfacebook:Facebook',
        // Register your Facebook application on http://www.facebook.com/developers
        // App ID or API key (requests with App ID should be faster; https://github.com/facebook/php-sdk/issues/214)
        'api_key' => '475164637214699',
        // App Secret
        'secret' => 'd65dc6b6a1c127159a63aa9d972fc550',
        // which additional data permissions to request from user
        // see http://developers.facebook.com/docs/authentication/permissions/ for the full list
        //'req_perms' => 'email,user_birthday',
        // Which additional user profile fields to request.
        // When empty, only the app-specific user id and name will be returned
        // See https://developers.facebook.com/docs/graph-api/reference/v2.6/user for the full list
        // 'user_fields' => 'email,birthday,third_party_id,name,first_name,last_name',
    ],
    */

    /*
    'example-sql' => [
        'sqlauth:SQL',
        'dsn' => 'pgsql:host=sql.example.org;port=5432;dbname=simplesaml',
        'username' => 'simplesaml',
        'password' => 'secretpassword',
        'query' => 'SELECT uid, givenName, email, eduPersonPrincipalName FROM users WHERE uid = :username ' .
            'AND password = SHA2(CONCAT((SELECT salt FROM users WHERE uid = :username), :password), 256);',
    ],
    */

    /*
    'example-static' => [
        'exampleauth:StaticSource',
        'uid' => ['testuser'],
        'eduPersonAffiliation' => ['member', 'employee'],
        'cn' => ['Test User'],
    ],
    */

    
    'example-userpass' => [
        'exampleauth:UserPass',

        // Give the user an option to save their username for future login attempts
        // And when enabled, what should the default be, to save the username or not
        //'remember.username.enabled' => false,
        //'remember.username.checked' => false,

        'student:123' => [
            'uid' => ['student1'],
			'email' => ['student1@gmmmm.com'],
            'eduPersonAffiliation' => ['member', 'student'],
        ],
        'employee:123' => [
            'uid' => ['employee1'],
			'email' => ['employee1@gmmmm.com'],
            'eduPersonAffiliation' => ['member', 'employee'],
        ],
    ],
    

    /*
    'crypto-hash' => [
        'authcrypt:Hash',
        // hashed version of 'verysecret', made with bin/pwgen.php
        'professor:{SSHA256}P6FDTEEIY2EnER9a6P2GwHhI5JDrwBgjQ913oVQjBngmCtrNBUMowA==' => [
            'uid' => ['prof_a'],
            'eduPersonAffiliation' => ['member', 'employee', 'board'],
        ],
    ],
    */

    /*
    // Microsoft Account (Windows Live ID) Authentication API.
    // Register your application to get an API key here:
    //  https://apps.dev.microsoft.com/
    'windowslive' => [
        'authwindowslive:LiveID',
        'key' => 'xxxxxxxxxxxxxxxx',
        'secret' => 'xxxxxxxxxxxxxxxx',
    ],
    */
];