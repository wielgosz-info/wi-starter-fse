<?php

namespace WI\StarterFSE;
use Kucrut\Vite;

class Assets {
	private string $distDir;

	public function __construct() {
		$this->distDir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueAssets' ) );
	}

	public function enqueueAssets(): void {
		Vite\enqueue_asset(
			$this->distDir,
			'src/scripts/main.ts',
			[
				'handle' => 'wi-starter-fse-main',
				'dependencies' => [ ], // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => [ ], // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			]
		);
	}
}