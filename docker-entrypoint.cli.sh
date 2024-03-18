#!/bin/sh
set -euo pipefail

# This script is used to configure the container after creation.
# It needs an access to the mounted volumes.

if ! wp core is-installed 2>/dev/null; then
	# Install WordPress; this should run only once in project's lifetime
	wp core install --url="http://${WP_VIRTUAL_HOST}" --title=${THEME_NAME} --admin_user=${WP_ADMIN_USER} --admin_password=${WP_ADMIN_PASSWORD} --admin_email="${WP_ADMIN_USER}@${WP_VIRTUAL_HOST}" --locale=${WP_LOCALE} --skip-email
	# If successful, activate the theme and delete the default plugins and themes
	if wp core is-installed 2>/dev/null; then
		wp theme activate ${THEME_SLUG}
		wp plugin delete akismet hello
		wp theme delete twentytwentytwo twentytwentythree
		cd wp-content/themes/${THEME_SLUG} && composer install
	fi
fi

exec "$@"
