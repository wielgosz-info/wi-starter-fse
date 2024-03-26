<?php

namespace WI\StarterFSE;

use Kucrut\Vite;

class Assets {
	private string $dist_dir;

	public function __construct() {
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function enqueue_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			'src/scripts/main.ts',
			[
				'handle' => 'wi-starter-fse-main',
				'dependencies' => [], // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => [], // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			]
		);
	}
}
