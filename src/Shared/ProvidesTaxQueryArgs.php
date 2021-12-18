<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports taxonomy queries.
 */
trait ProvidesTaxQueryArgs {
	/**
	 * A `TaxQuery` object representing the `WP_Tax_Query` constructor argument.
	 */
	public TaxQuery $tax_query;

	public function setTaxQuery( TaxQuery $tax_query ) : void {
		$this->tax_query = $tax_query;
	}
}
