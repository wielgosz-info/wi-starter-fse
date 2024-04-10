<?php
/**
 * Theme assets
 *
 * @package WI\StarterFSE
 */

namespace WI\StarterFSE;

use Kucrut\Vite;

class Assets {
	private string $dist_dir;

	public function __construct() {
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action( 'after_setup_theme', array( $this, 'add_editor_css' ), 50 );
	}

	public function enqueue_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			'src/scripts/main.ts',
			array(
				'handle' => 'wi-starter-fse-main',
				'dependencies' => array(), // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => array(), // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			),
		);
	}

	public function enqueue_editor_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			'src/scripts/editor.ts',
			array(
				'handle' => 'wi-sonx-fse-editor',
				'dependencies' => array(), // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => array(), // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			),
		);
	}

	/**
	 * Add editor styles
	 *
	 * `add_editor_style` cannot accept style handle,
	 * so we're getting the stylesheet URL from the manifest.
	 *
	 * @return void
	 */
	public function add_editor_css(): void {
		// add editor styles into the block editor
		try {
			$manifest = Vite\get_manifest( $this->dist_dir );
		} catch ( \Exception $e ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				wp_die( esc_html( $e->getMessage() ) );
			}

			return;
		}

		$file = get_object_vars($manifest->data)['src/scripts/editor.css']->file;
		$editor_stylesheet = get_template_directory_uri() . '/dist/' . $file;

		add_editor_style( $editor_stylesheet );
	}
}
