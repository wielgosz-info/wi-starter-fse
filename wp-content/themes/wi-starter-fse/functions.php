<?php

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Load the theme settings.
new \WI\StarterFSE\Assets();
new \WI\StarterFSE\Theme();

if ( is_admin() ) {
	new \WI\StarterFSE\Editor();
}
