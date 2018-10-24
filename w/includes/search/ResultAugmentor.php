<?php

/**
 * Augment loadPage results.
 */
interface ResultAugmentor {
	/**
	 * Produce data to augment loadPage result set.
	 * @param SearchResult $result
	 * @return mixed Data for this result
	 */
	public function augment( SearchResult $result );
}
