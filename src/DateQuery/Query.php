<?php

declare(strict_types=1);

namespace Args\DateQuery;

use Args\Arrayable\Arrayable;

/**
 * Structure for a `date_query` argument.
 */
final class Query implements Arrayable, Values {
	/**
	 * The column to query against.
	 *
	 * If undefined, inherits the value of the `$default_column` parameter. See WP_Date_Query::validate_column() and the 'date_query_valid_columns' filter for the list of accepted values.
	 *
	 * Default 'post_date'.
	 */
	public string $column;

	/**
	 * The comparison operator.
	 *
	 * Accepts '=', '!=', '>', '>=', '<', '<=', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN'.
	 *
	 * Default '='.
	 *
	 * @phpstan-var Values::DATE_QUERY_COMPARE_*
	 */
	public string $compare;

	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var Values::DATE_QUERY_RELATION_*
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
	 * Supported time-related parameter keys.
	 *
	 * @var list<string>
	 */
	private const TIME_KEYS = [
		'after',
		'before',
		'year',
		'month',
		'monthnum',
		'week',
		'w',
		'dayofyear',
		'day',
		'dayofweek',
		'dayofweek_iso',
		'hour',
		'minute',
		'second',
	];

	/**
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/40bc4f565a871f1ac0eda3111781168133ca06aa/src/wp-includes/class-wp-date-query.php#L189-L237 WP_Date_Query::sanitize_query()}.
	 *
	 * @param mixed[] $queries
	 * @return static
	 */
	final public static function fromArray( array $queries ) : self {
		$class = new static();

		foreach ( $queries as $key => $query ) {
			if ( 'column' === $key ) {
				$class->column = $query;
			} elseif ( 'compare' === $key ) {
				$class->compare = $query;
			} elseif ( 'relation' === $key ) {
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
	 * See {@link https://github.com/WordPress/wordpress-develop/blob/40bc4f565a871f1ac0eda3111781168133ca06aa/src/wp-includes/class-wp-date-query.php#L250-L253 WP_Date_Query::is_first_order_clause()}.
	 *
	 * @param mixed[] $query
	 */
	private function isFirstOrderClause( array $query ) : bool {
		$time_keys = array_intersect( self::TIME_KEYS, array_keys( $query ) );
		return count( $time_keys ) > 0;
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

		if ( isset( $this->column ) ) {
			$vars['column'] = $this->column;
		}
		if ( isset( $this->compare ) ) {
			$vars['compare'] = $this->compare;
		}
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
