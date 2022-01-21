<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports date queries.
 */
trait ProvidesDateQueryArgs {
	/**
	 * A `\Args\DateQuery\Query` object representing the `WP_Date_Query` constructor argument.
	 */
	public \Args\DateQuery\Query $date_query;

	public function setDateQuery( \Args\DateQuery\Query $date_query ) : void {
		$this->date_query = $date_query;
	}
}
