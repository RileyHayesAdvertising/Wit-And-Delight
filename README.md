# Wit & Delight

Wit & Delight is the personal website of Kate Arends.

## Important URLs
* Staging: N/A
* Production: http://www.witanddelight.com

## Technical Requirements

* Modern LAMP Stack
* WordPress @ Latest Release

## Supported Desktop Browsers

* Chrome: Latest stable release
* Firefox: Latest stable release
* Internet Explorer: 11+ 
* Safari: 9+

## Supported Mobile Devices (stock browsers)

* Android: 5+
* iOS: 9+

## Dev Environment Setup

1. Request access to the git repository and the development database

1. Clone the git repository to your dev environment
   
   `git clone https://github.com/RileyHayesAdvertising/witanddelight.com.git`

1. Switch to the working directory in your dev environment

   `cd path/to/dev/witanddelight.com/`

1. Checkout WordPress from github

   `git clone https://github.com/WordPress/WordPress.git wordpress`

1. Switch to the wordpress directory

    `cd path/to/dev/witanddelight.com/wordpress/`

1. Fetch the wordpress tags
    
    `git fetch --tags`

1. List all the tags and note the latest release
    
    `git tag -l`

1. Check out the most recent tag (replace 4.4.2 with the most recent release number)
    
    `git checkout 4.4.2`
    
1. Return to the working directory

    `cd path/to/dev/witanddelight.com/`

1. Create a `wp-config.php` file

   `touch wp-config.php`

1. Open `wp-config.php` and add the following code

   ```
<?php

define('DB_NAME', 'database');
define('DB_USER', 'foo');
define('DB_PASSWORD', 'bar');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');

define('AUTH_KEY', '');
define('SECURE_AUTH_KEY', '');
define('LOGGED_IN_KEY', '');
define('NONCE_KEY', '');
define('AUTH_SALT', '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT', '');
define('NONCE_SALT', '');

$table_prefix  = 'wp_';

define('WP_DEBUG', false);

/** ----------------- CUSTOM CONFIG ------------- */

define('WP_SITEURL', 'http://localhost:8888/witanddelight.com/wordpress');
define('WP_HOME',    'http://localhost:8888/witanddelight.com');

define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/witanddelight.com/wp-content');
define('WP_CONTENT_URL', 'http://localhost:8888/witanddelight.com/wp-content');

/** --------------- END CUSTOM CONFIG ----------- */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
?>
```

1. Modify `wp-config.php` to run locally.

   * Setup Authentication Unique Keys and Salts
   * Check the password manager for the authentication credentials and database name and update them accordingly for the database
   * Update with custom config at the bottom of the file with the proper `WP_SITEURL`, `WP_HOME`, `WP_CONTENT_DIR`, and `WP_CONTENT_URL` for your dev environment

1. Create an `.htaccess.dist` file

   `touch .htaccess`

1. 1. Open `.htaccess` and add the following code

   ```
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /witanddelight.com/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /witanddelight.com/index.php [L]
</IfModule>
# END WordPress
```

1. Modify `.htaccess` to run locally.

   * Update the `RewriteBase` and `RewriteRule` to point to the proper location in your dev environment

1. Create an `index.php` file

   `touch index.php`

1. Open `index.php` and add the following code

   ```
define('WP_USE_THEMES', true);
require( dirname( __FILE__ ) . '/wordpress/wp-blog-header.php' );
```
   
1. Visit your dev environment in the browser and verify the site is working

If additional questions arise during setup please contact <tticknor@rileyhayes.com>

## Deployment

Deployments are currently done via SFTP to WPEngine as it's the only means of server access. Additionally, most of WordPress itself is handled by WPEngine so you only need to upload the following part of the project.

1. Changes to the theme
2. Changes to the plugins

**Note:** Before copying files on to the server, pull down any files you plan to copy and check them for changes that might have occurred on production (like plugin updates) and merge them into the repo. Then move files to prod.
