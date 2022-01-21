<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Methods for any query class that supports taxonomy queries.
 */
interface WithTaxQueryArgs {
	public function setTaxQuery( \Args\TaxQuery\Query $tax_query ) : void;
}
