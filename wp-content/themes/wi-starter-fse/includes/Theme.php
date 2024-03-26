<?php

namespace WI\StarterFSE;

class Theme
{
	public function __construct()
	{
		add_filter('default_wp_template_part_areas', array($this, 'templatePartAreas'));
		add_filter('should_load_remote_block_patterns', '__return_false');
	}

	public function templatePartAreas(array $areas)
	{
		$areas[] = array(
			'area' => 'loop',
			'area_tag' => 'section',
			'label' => __('Loop', 'wi-starter-fse'),
			'description' => __('Posts loop section', 'wi-starter-fse'),
			'icon' => 'layout'
		);

		return $areas;
	}
}
