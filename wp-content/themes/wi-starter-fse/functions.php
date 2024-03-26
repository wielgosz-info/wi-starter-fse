<?php

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Load the theme settings.
new \WI\StarterFSE\Assets();
new \WI\StarterFSE\Theme();

// Development helpers.
if ( wp_is_development_mode( 'theme' ) ) {
	new \WI\StarterFSE\Dev\GlobalStyles();

	if ( is_admin() ) {
		new \WI\StarterFSE\Dev\AppearanceTools();
	}
}
