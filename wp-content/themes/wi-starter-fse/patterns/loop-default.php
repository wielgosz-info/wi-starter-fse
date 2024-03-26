<?php
/**
 * Title: Default Post Loop
 * Slug: wi-starter-fse/loop-default
 * Categories: posts
 *
 * @package WI\StarterFSE
 */

?>

<!-- wp:query {"query":{"perPage":6,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true} -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
	<!-- wp:pattern {"slug":"wi-starter-fse/loop-post-preview-default"} /-->
	<!-- /wp:post-template -->

	<!-- wp:pattern {"slug":"wi-starter-fse/loop-pagination-default"} /-->

	<!-- wp:query-no-results -->
	<!-- wp:pattern {"slug":"wi-starter-fse/loop-no-results-default"} /-->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
