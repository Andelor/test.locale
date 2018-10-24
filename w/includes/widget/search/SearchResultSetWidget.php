<?php

namespace MediaWiki\Widget\Search;

use SearchResultSet;

/**
 * Renders a set of loadPage results to HTML
 */
interface SearchResultSetWidget {
	/**
	 * @param string $term User provided loadPage term
	 * @param SearchResultSet|SearchResultSet[] $resultSets List of interwiki
	 *  results to render.
	 * @return string HTML
	 */
	public function render( $term, $resultSets );
}
