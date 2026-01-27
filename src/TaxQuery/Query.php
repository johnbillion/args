<?php

declare(strict_types=1);

namespace Args\TaxQuery;

use Args\Arrayable\Arrayable;

/**
 * Structure for a `tax_query` argument.
 */
final class Query implements Arrayable, Values {
	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var Values::TAX_QUERY_RELATION_*
	 */
	public string $relation;

	/**
	 * @var array<int|string, Clause>
	 */
	public array $clauses;

	/**
	 * @var array<int|string, Query>
	 */
	public array $queries;

	/**
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/trunk/src/wp-includes/class-wp-tax-query.php WP_Tax_Query::sanitize_query()}.
	 *
	 * @param mixed[] $queries
	 * @return static
	 */
	final public static function fromArray( array $queries ) : self {
		$class = new static();

		foreach ( $queries as $key => $query ) {
			if ( 'relation' === $key ) {
				$class->relation = $query;
			} elseif ( ! is_array( $query ) ) {
				continue;
			} elseif ( $class->isFirstOrderClause( $query ) ) {
				$class->addClause( Clause::fromArray( $query ), is_string( $key ) ? $key : null );
			} else {
				$class->addQuery( Query::fromArray( $query ), is_string( $key ) ? $key : null );
			}
		}

		return $class;
	}

	/**
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/trunk/src/wp-includes/class-wp-tax-query.php WP_Tax_Query::is_first_order_clause()}.
	 *
	 * @param mixed[] $query
	 */
	private function isFirstOrderClause( array $query ) : bool {
		return count( $query ) === 0 ||
			array_key_exists( 'terms', $query ) ||
			array_key_exists( 'taxonomy', $query ) ||
			array_key_exists( 'include_children', $query ) ||
			array_key_exists( 'field', $query ) ||
			array_key_exists( 'operator', $query );
	}

	final public function addClause( Clause $clause, ?string $key = null ) : void {
		if ( null !== $key ) {
			$this->clauses[ $key ] = $clause;
		} else {
			$this->clauses[] = $clause;
		}
	}

	final public function addQuery( Query $query, ?string $key = null ) : void {
		if ( null !== $key ) {
			$this->queries[ $key ] = $query;
		} else {
			$this->queries[] = $query;
		}
	}

	/**
	 * @return ?array<string|int,mixed>
	 */
	final public function toArray() : ?array {
		$has_clauses = isset( $this->clauses ) && count( $this->clauses ) > 0;
		$has_queries = isset( $this->queries ) && count( $this->queries ) > 0;

		if ( ! $has_clauses && ! $has_queries ) {
			return null;
		}

		$vars = [];
		$i = 0;

		if ( isset( $this->relation ) ) {
			$vars['relation'] = $this->relation;
		}

		if ( $has_clauses ) {
			foreach ( $this->clauses as $key => $clause ) {
				if ( is_string( $key ) ) {
					$vars[ $key ] = $clause->toArray();
				} else {
					$vars[ $i++ ] = $clause->toArray();
				}
			}
		}

		if ( $has_queries ) {
			foreach ( $this->queries as $key => $query ) {
				$value = $query->toArray();

				if ( null === $value ) {
					continue;
				}

				if ( is_string( $key ) ) {
					$vars[ $key ] = $value;
				} else {
					$vars[ $i++ ] = $value;
				}
			}
		}

		return $vars;
	}

}
