<?php
/**
 * Title: Default No Results Section
 * Slug: wi-starter-fse/loop-no-results-default
 * Categories: posts
 * Inserter: false
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:pullquote -->
    <figure class="wp-block-pullquote">
        <blockquote>
            <p><?php esc_html_e('There is no such thing as failure. There are only results.', 'wi-starter-fse'); ?></p>
			<cite>Tony Robbins</cite>
        </blockquote>
    </figure>
    <!-- /wp:pullquote -->

    <!-- wp:paragraph {"align":"right"} -->
    <p class="has-text-align-right"><?php esc_html_e('...or no results, as case may be. Try again?', 'wi-starter-fse'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:search {"label":"Search","buttonText":"Search","align":"center"} /-->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
        <!-- wp:paragraph -->
        <p><?php esc_html_e('Looking for a specific topic?', 'wi-starter-fse'); ?></p>
        <!-- /wp:paragraph -->

		<!-- wp:tag-cloud /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
