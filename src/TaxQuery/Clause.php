<?php

declare(strict_types=1);

namespace Args\TaxQuery;

use Args\Arrayable\Arrayable;

/**
 * Arguments for a clause within a taxonomy query, for example those within a `$tax_query` argument.
 */
final class Clause implements Arrayable, Values {
	use \Args\Arrayable\ProvidesFromArray;
	use \Args\Arrayable\ProvidesToArray;

	/**
	 * Taxonomy being queried. Optional when field=term_taxonomy_id.
	 */
	public string $taxonomy;

	/**
	 * Term or terms to filter by.
	 *
	 * @var string|int|array<int,string>|array<int,int>
	 */
	public string|int|array $terms;

	/**
	 * Field to match `$terms` against. Accepts:
	 *
	 *   - 'term_id'
	 *   - 'slug'
	 *   - 'name'
	 *   - 'term_taxonomy_id'
	 *
	 * Default: 'term_id'.
	 *
	 * @phpstan-var 'term_id'|'slug'|'name'|'term_taxonomy_id'
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
	 *
	 * @phpstan-var Values::TAX_QUERY_OPERATOR_*
	 */
	public string $operator;

	/**
	 * Whether to include child terms. Requires a `$taxonomy`.
	 *
	 * @alias include_children
	 *
	 * Default: true.
	 */
	public bool $children;

	/**
	 * Whether to include child terms. Requires a `$taxonomy`.
	 *
	 * Default: true.
	 */
	public bool $include_children;

	/**
	 * @return array<string,mixed>
	 */
	final public function toArray(): array {
		$vars = get_object_vars( $this );
		if ( isset( $this->children ) && ! isset( $this->include_children ) ) {
			$vars['include_children'] = $this->children;
		}
		\ksort( $vars );

		return $vars;
	}
}
