<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports date queries.
 */
trait ProvidesDateQueryArgs {
	/**
	 * A `DateQuery` object representing the `WP_Date_Query` constructor argument.
	 */
	public DateQuery $date_query;

	public function setDateQuery( DateQuery $date_query ) : void {
		$this->date_query = $date_query;
	}
}
