<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Structure for a `tax_query` argument.
 */
final class TaxQuery implements Arrayable, TaxQueryValues {
	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var TaxQueryValues::TAX_QUERY_RELATION_*
	 */
	public string $relation;

	/**
	 * @var array<int, TaxQueryClause>
	 */
	public array $clauses;

	/**
	 * @param mixed[] $clauses
	 * @return static
	 */
	final public static function fromArray( array $clauses ) : self {
		$class = new static();

		foreach ( $clauses as $key => $value ) {
			if ( 'relation' === $key ) {
				$class->relation = $value;
			} else {
				$class->addClause( TaxQueryClause::fromArray( $value ) );
			}
		}

		return $class;
	}

	final public function addClause( TaxQueryClause $clause ) : void {
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

		if ( isset( $this->relation ) ) {
			$vars['relation'] = $this->relation;
		}

		foreach ( $this->clauses as $key => $value ) {
			$vars[ $key ] = $value->toArray();
		}

		return $vars;
	}

}
