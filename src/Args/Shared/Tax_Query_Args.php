<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports taxonomy queries.
 */
trait Tax_Query_Args {
	/**
	 * Array of associative arrays of WP_Tax_Query arguments. See WP_Tax_Query->__construct().
	 *
	 * @var mixed[]
	 */
	public array $tax_query;
}
