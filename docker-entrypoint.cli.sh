#!/bin/sh
set -euo pipefail

# This script is used to configure the container after creation.
# It needs an access to the mounted volumes.

if ! wp core is-installed 2>/dev/null; then
	# Replace all uses of the theme name, slug and namespace in the project files.
	# Checks *.php, *.html, *.css, *.ts, *.json, *.md, *.txt, .gitignore

	find . -regex '.*\.\(php\|html\|css\|ts\|json\|md\|txt\)' -type f -exec sed -i "s/WI Starter FSE/${THEME_NAME}/g" {} +
	find . -regex '.*\.\(php\|html\|css\|ts\|json\|md\|txt\)' -type f -exec sed -i "s/wi-starter-fse/${THEME_SLUG}/g" {} +
	find . -regex '.*\.\(php\|html\|css\|ts\|json\|md\|txt\)' -type f -exec sed -i "s/WI\\StarterFSE/${THEME_NAMESPACE}/g" {} +

	find . -name '.gitignore' -type f -exec sed -i "s/wi-starter-fse/${THEME_SLUG}/g" {} +

	# Rename the theme directory
	mv wp-content/themes/wi-starter-fse wp-content/themes/${THEME_SLUG}

	# Install WordPress; this should run only once in project's lifetime
	wp core install --url="http://${WP_VIRTUAL_HOST}" --title=${THEME_NAME} --admin_user=${WP_ADMIN_USER} --admin_password=${WP_ADMIN_PASSWORD} --admin_email="${WP_ADMIN_USER}@${WP_VIRTUAL_HOST}" --locale=${WP_LOCALE} --skip-email
	# If successful, activate the theme and delete the default plugins and themes
	if wp core is-installed 2>/dev/null; then
		# Clean up the default plugins and themes
		wp plugin delete akismet hello
		wp theme delete twentytwentytwo twentytwentythree

		# Install all the required plugins & automatically activate developer plugins
		composer install
		wp plugin activate query-monitor wp-mail-logging theme-check

		# Install the theme dependencies
		cd wp-content/themes/${THEME_SLUG} && composer install

		# Activate the theme
		wp theme activate ${THEME_SLUG}

		# Import the test data if required
		if [ "${THEME_USE_TEST_DATA}" = true ]; then
			wp plugin activate wordpress-importer
			wget -O /tmp/themeunittestdata.wordpress.xml https://raw.githubusercontent.com/WordPress/theme-test-data/master/themeunittestdata.wordpress.xml
			wp import /tmp/themeunittestdata.wordpress.xml --authors=create
			rm /tmp/themeunittestdata.wordpress.xml
		fi
	fi
fi

exec "$@"
