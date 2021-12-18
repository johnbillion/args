<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Structure for a `date_query` argument.
 */
final class DateQuery implements Arrayable, DateQueryValues {
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
	 * @phpstan-var DateQueryValues::DATE_QUERY_COMPARE_*
	 */
	public string $compare;

	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var DateQueryValues::DATE_QUERY_RELATION_*
	 */
	public string $relation;

	/**
	 * @var DateQueryClause[]
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
				$class->addClause( DateQueryClause::fromArray( $value ) );
			}
		}

		return $class;
	}

	final public function addClause( DateQueryClause $clause ) : void {
		$this->clauses[] = $clause;
	}

	/**
	 * @return mixed[]|null
	 */
	final public function toArray() :? array {
		if ( empty( $this->clauses ) ) {
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
