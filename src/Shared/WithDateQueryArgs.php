<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Methods for any query class that supports date queries.
 */
interface WithDateQueryArgs {
	public function setDateQuery( DateQuery $tax_query ) : void;
}
