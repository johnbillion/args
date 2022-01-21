<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports taxonomy queries.
 */
trait ProvidesTaxQueryArgs {
	/**
	 * A `\Args\TaxQuery\Query` object representing the `WP_Tax_Query` constructor argument.
	 */
	public \Args\TaxQuery\Query $tax_query;

	public function setTaxQuery( \Args\TaxQuery\Query $tax_query ) : void {
		$this->tax_query = $tax_query;
	}
}
