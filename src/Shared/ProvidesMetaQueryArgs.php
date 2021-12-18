<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports meta queries.
 */
trait ProvidesMetaQueryArgs {
	/**
	 * Meta key or keys to filter by.
	 *
	 * @var string|array<int,string>
	 */
	public $meta_key;

	/**
	 * Meta value or values to filter by.
	 *
	 * @var string|array<int,string>
	 */
	public $meta_value;

	/**
	 * MySQL operator used for comparing the meta value.
	 *
	 * Default is 'IN' when `meta_value` is an array, '=' otherwise.
	 *
	 * @phpstan-var MetaQueryValues::META_COMPARE_VALUE_*
	 */
	public string $meta_compare;

	/**
	 * MySQL operator used for comparing the meta key.
	 *
	 * Default is 'IN' when `meta_key` is an array, '=' otherwise.
	 *
	 * @phpstan-var MetaQueryValues::META_COMPARE_KEY_*
	 */
	public string $meta_compare_key;

	/**
	 * MySQL data type that the `meta_value` column will be CAST to for comparisons.
	 *
	 * @phpstan-var MetaQueryValues::META_TYPE_VALUE_*
	 */
	public string $meta_type;

	/**
	 * MySQL data type that the `meta_key` column will be CAST to for comparisons.
	 *
	 * @phpstan-var MetaQueryValues::META_TYPE_KEY_*
	 */
	public string $meta_type_key;

	/**
	 * A `MetaQuery` object representing the `WP_Meta_Query` constructor argument.
	 */
	public MetaQuery $meta_query;

	public function setMetaQuery( MetaQuery $meta_query ) : void {
		$this->meta_query = $meta_query;
	}
}
