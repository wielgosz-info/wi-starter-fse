<?php
/**
 * Entrypoint for theme functions and definitions
 *
 * @package WI\StarterFSE
 */

 global $wp_filesystem;

 // Make sure that the above variable is properly setup.
 require_once ABSPATH . 'wp-admin/includes/file.php';
 WP_Filesystem();

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Load the theme settings.
\WI\StarterFSE\Assets::get_instance();
\WI\StarterFSE\Theme::get_instance();
\WI\StarterFSE\Blocks::get_instance();

// Development helpers.
if ( wp_is_development_mode( 'theme' ) ) {
	\WI\StarterFSE\Dev\GlobalStyles::get_instance();

	if ( is_admin() ) {
		\WI\StarterFSE\Dev\AppearanceTools::get_instance();
	}
}
