<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for a single clause of the `WP_Tax_Query` class in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_tax_query/__construct/
 */
class WP_Tax_Query_Clause extends Base {

	/**
	 * Taxonomy being queried. Optional when `field=term_taxonomy_id`.
	 */
	public string $taxonomy;

	/**
	 * Term or terms to filter by.
	 *
	 * @var string|int|string[]|int[]
	 */
	public $terms;

	/**
	 * Field to match $terms against. Accepts 'term_id', 'slug', 'name', or 'term_taxonomy_id'. Default: 'term_id'.
	 */
	public string $field;

	/**
	 * MySQL operator to be used with $terms in the WHERE clause. Accepts 'AND', 'IN', 'NOT IN', 'EXISTS', 'NOT EXISTS'. Default: 'IN'.
	 */
	public string $operator;

	/**
	 * Optional. Whether to include child terms. Requires a `$taxonomy`. Default: true.
	 */
	public bool $include_children;
}
