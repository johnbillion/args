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
	 * @var array<int, Clause>
	 */
	public array $clauses;

	/**
	 * @param mixed[] $clauses
	 * @return static
	 */
	final public static function fromArray( array $clauses ) : self {
		$class = new static();

		foreach ( $clauses as $key => $value ) {
			if ( 'column' === $key ) {
				$class->column = $value;
			} elseif ( 'compare' === $key ) {
				$class->compare = $value;
			} elseif ( 'relation' === $key ) {
				$class->relation = $value;
			} else {
				$class->addClause( Clause::fromArray( $value ) );
			}
		}

		return $class;
	}

	final public function addClause( Clause $clause ) : void {
		$this->clauses[] = $clause;
	}

	/**
	 * @return ?array<string|int,mixed>
	 */
	final public function toArray() :? array {
		if ( ! isset( $this->clauses ) || count( $this->clauses ) === 0 ) {
			return null;
		}

		$vars = [];

		if ( isset( $this->column ) ) {
			$vars['column'] = $this->column;
		}
		if ( isset( $this->compare ) ) {
			$vars['compare'] = $this->compare;
		}
		if ( isset( $this->relation ) ) {
			$vars['relation'] = $this->relation;
		}

		foreach ( $this->clauses as $key => $value ) {
			$vars[ $key ] = $value->toArray();
		}

		return $vars;
	}

}
