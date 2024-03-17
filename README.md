# WI Starter FSE
Starting point for WordPress FSE themes development.

# Setup

## Prepare proxy (only one is needed for all projects)

1. Create `proxy` network

```sh
docker network create proxy
```

2. Run proxy service:

```sh
docker compose -f docker-compose.proxy.yaml up -d --build
```

## Install WP & (optionally) theme test data & helper plugins

1. Prepare dockers:

```sh
docker compose --profile cli -f docker-compose.yaml up -d --build
```

2. Connect to CLI container (you should be in `/var/www/html`) and run:

```sh
wp core install --url="http://${WP_VIRTUAL_HOST}" --title=${THEME_NAME} --admin_user=${WP_ADMIN_USER} --admin_password=${WP_ADMIN_PASSWORD} --admin_email="${WP_ADMIN_USER}@${WP_VIRTUAL_HOST}" --locale=${WP_LOCALE} --skip-email
wp theme activate ${THEME_SLUG}
wp plugin delete akismet hello
wp theme delete twentytwentytwo twentytwentythree
cd wp-content/themes/${THEME_SLUG} && composer install
```

3. [Optional] Import test data:

```sh
wp plugin install wordpress-importer --activate
wget -O /tmp/themeunittestdata.wordpress.xml https://raw.githubusercontent.com/WordPress/theme-test-data/master/themeunittestdata.wordpress.xml
wp import /tmp/themeunittestdata.wordpress.xml --authors=create
```

4. [Optional] Install helper plugins. Hint: they are already in `.gitignore`.

```sh
wp plugin install query-monitor --activate
wp plugin install wp-mail-logging --activate
```