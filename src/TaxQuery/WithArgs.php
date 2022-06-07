<?php

declare(strict_types=1);

namespace Args\TaxQuery;

/**
 * Methods for any query class that supports taxonomy queries.
 */
interface WithArgs {
	public function setTaxQuery( Query $tax_query ) : void;
}
