<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that allows querying by meta data.
 */
trait Query_By_Meta_Args {
	/**
	 * Meta key to filter by.
	 */
	public string $meta_key;

	/**
	 * Meta value to filter by.
	 */
	public string $meta_value;

	/**
	 * MySQL operator used for comparing the meta value.
	 *
	 * Default '='.
	 *
	 * @phpstan-var self::META_COMPARE_VALUE_*
	 */
	public string $meta_compare;

	/**
	 * MySQL operator used for comparing the meta key.
	 */
	public string $meta_compare_key;

	/**
	 * MySQL data type that the meta_value column will be CAST to for comparisons.
	 */
	public string $meta_type;

	/**
	 * MySQL data type that the meta_key column will be CAST to for comparisons.
	 */
	public string $meta_type_key;

	/**
	 * An associative array of WP_Meta_Query arguments.
	 */
	public array $meta_query;
}
