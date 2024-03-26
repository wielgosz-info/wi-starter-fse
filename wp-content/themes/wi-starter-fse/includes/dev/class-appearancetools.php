<?php

namespace WI\StarterFSE\Dev;

class AppearanceTools {
	public function __construct() {
		add_filter( 'wp_theme_json_data_theme', array( $this, 'enableAllAppearanceTools' ) );
	}

	/**
	 * Enable all appearance tools when in development mode.
	 * Has similar effect to setting `appearanceTools: true` in `theme.json`,
	 * but enables a bit more than just \WP_Theme_JSON::APPEARANCE_TOOLS_OPT_INS,
	 * since by default we turn everything off.
	 *
	 * @param \WP_Theme_JSON_Data $theme_json
	 *
	 * @return \WP_Theme_JSON_Data
	 */
	public function enableAllAppearanceTools( $theme_json ) {
		$appearance_tools = [
			"settings" => [
				"border" => [
					"color" => true,
					"radius" => true,
					"width" => true,
					"style" => true
				],
				"color" => [
					"background" => true,
					"text" => true,
					"heading" => true,
					"link" => true,
					"button" => true,
					"caption" => true,
				],
				"background" => [
					"backgroundImage" => true,
					"backgroundSize" => true
				],
				"dimensions" => [
					"aspectRatio" => true,
					"minHeight" => true
				],
				"layout" => [
					"allowEditing" => true,
					"allowCustomContentAndWideSize" => true
				],
				"lightbox" => [
					"enabled" => true,
					"allowEditing" => true
				],
				"position" => [
					"sticky" => true
				],
				"spacing" => [
						"blockGap" => true,
						"margin" => true,
						"padding" => true,
						"customSpacingSize" => true,
					],
				"typography" => [
					"customFontSize" => true,
					"fontStyle" => true,
					"fontWeight" => true,
					"letterSpacing" => true,
					"lineHeight" => true,
					"textColumns" => true,
					"textDecoration" => true,
					"writingMode" => true,
					"textTransform" => true,
					"dropCap" => true,
				]
			]
		];

		return $theme_json->update_with( $appearance_tools );
	}
}
