<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that allows querying by meta data.
 */
trait Query_By_Meta_Args {
	/**
	 * Comparison operator to test the 'meta_value'.
	 *
	 * Default '='.
	 *
	 * @phpstan-var self::META_COMPARE_VALUE_*
	 */
	public string $meta_compare;
}
