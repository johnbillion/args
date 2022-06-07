<?php

declare(strict_types=1);

namespace Args\TaxQuery;

/**
 * Arguments for any query class that supports taxonomy queries.
 */
trait ProvidesArgs {
	/**
	 * A `Query` object representing the `WP_Tax_Query` constructor argument.
	 */
	public Query $tax_query;

	public function setTaxQuery( Query $tax_query ) : void {
		$this->tax_query = $tax_query;
	}
}
