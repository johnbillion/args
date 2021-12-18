<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for a clause within a taxonomy query, for example those within a `$tax_query` argument.
 */
final class TaxQueryClause implements Arrayable, TaxQueryValues {
	use ProvidesFromArray;
	use ProvidesToArray;

	/**
	 * Taxonomy being queried. Optional when field=term_taxonomy_id.
	 */
	public string $taxonomy;

	/**
	 * Term or terms to filter by.
	 *
	 * @var mixed
	 */
	public $terms;

	/**
	 * Field to match `$terms` against. Accepts:
	 *
	 *   - 'term_id'
	 *   - 'slug'
	 *   - 'name'
	 *   - 'term_taxonomy_id'
	 *
	 * Default: 'term_id'.
	 */
	public string $field;

	/**
	 * MySQL operator to be used with $terms in the WHERE clause.
	 *
	 * Accepts:
	 *
	 *   - 'AND'
	 *   - 'IN'
	 *   - 'NOT IN'
	 *   - 'EXISTS'
	 *   - 'NOT EXISTS'
	 *
	 * Default: 'IN'.
	 */
	public string $operator;

	/**
	 * Whether to include child terms. Requires a `$taxonomy`.
	 *
	 * Default: true.
	 */
	public bool $children;
}
