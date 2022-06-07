<?php

declare(strict_types=1);

namespace Args\DateQuery;

/**
 * Arguments for any query class that supports date queries.
 */
trait ProvidesArgs {
	/**
	 * A `Query` object representing the `WP_Date_Query` constructor argument.
	 */
	public Query $date_query;

	public function setDateQuery( Query $date_query ) : void {
		$this->date_query = $date_query;
	}
}
