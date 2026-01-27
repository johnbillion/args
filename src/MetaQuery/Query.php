<?php

declare(strict_types=1);

namespace Args\MetaQuery;

use Args\Arrayable\Arrayable;

/**
 * Structure for a `meta_query` argument.
 */
final class Query implements Arrayable, Values {
	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var Values::META_QUERY_RELATION_*
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
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/1bde4c3b15ea2aa7c65e68ba6ff72a22d2b43b12/src/wp-includes/class-wp-meta-query.php#L192-L247 WP_Meta_Query::sanitize_query()}.
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
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/1bde4c3b15ea2aa7c65e68ba6ff72a22d2b43b12/src/wp-includes/class-wp-meta-query.php#L249-L262 WP_Meta_Query::is_first_order_clause()}.
	 *
	 * @param mixed[] $query
	 */
	private function isFirstOrderClause( array $query ) : bool {
		return isset( $query['key'] ) || isset( $query['value'] );
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
