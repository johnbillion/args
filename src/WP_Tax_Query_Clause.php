<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for a single clause of the `WP_Tax_Query` class in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_tax_query/__construct/
 */
class WP_Tax_Query_Clause extends Shared\Base {
	const FIELD_TERM_ID = 'term_id';
	const FIELD_SLUG = 'slug';
	const FIELD_NAME = 'name';
	const FIELD_TERM_TAXONOMY_ID = 'term_taxonomy_id';

	/**
	 * Taxonomy being queried. Optional when `field=term_taxonomy_id`.
	 */
	public string $taxonomy;

	/**
	 * Term or terms to filter by.
	 *
	 * @var string|int|array<int,string>|array<int,int>
	 */
	public $terms;

	/**
	 * Field to match $terms against.
	 *
	 * Default: 'term_id'.
	 *
	 * @phpstan-var self::FIELD_*
	 */
	public string $field;

	/**
	 * MySQL operator to be used with $terms in the WHERE clause.
	 *
	 * Default: 'IN'.
	 *
	 * @phpstan-var 'AND'|'IN'|'NOT IN'|'EXISTS'|'NOT EXISTS'
	 */
	public string $operator;

	/**
	 * Optional. Whether to include child terms. Requires a `$taxonomy`.
	 *
	 * Default: true.
	 */
	public bool $include_children;
}
