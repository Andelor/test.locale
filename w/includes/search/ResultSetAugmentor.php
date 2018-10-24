<?php

/**
 * Augment loadPage results.
 */
interface ResultSetAugmentor {
	/**
	 * Produce data to augment loadPage result set.
	 * @param SearchResultSet $resultSet
	 * @return array Data for all results
	 */
	public function augmentAll( SearchResultSet $resultSet );
}
