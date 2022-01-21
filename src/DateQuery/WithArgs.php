<?php

declare(strict_types=1);

namespace Args\DateQuery;

/**
 * Methods for any query class that supports date queries.
 */
interface WithArgs {
	public function setDateQuery( Query $tax_query ) : void;
}
