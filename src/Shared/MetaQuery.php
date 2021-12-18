<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Structure for a `meta_query` argument.
 */
final class MetaQuery implements Arrayable, MetaQueryValues {
	/**
	 * The MySQL keyword used to join the clauses of the query. Accepts 'AND' or 'OR'.
	 *
	 * Default 'AND'.
	 *
	 * @phpstan-var MetaQueryValues::META_QUERY_RELATION_*
	 */
	public string $relation;

	/**
	 * @var MetaQueryClause[]
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
			} elseif ( is_string( $key ) ) {
				$class->addClause( MetaQueryClause::fromArray( $value ), $key );
			} else {
				$class->addClause( MetaQueryClause::fromArray( $value ) );
			}
		}

		return $class;
	}

	final public function addClause( MetaQueryClause $clause, string $key = null ) : void {
		if ( null !== $key ) {
			$this->clauses[ $key ] = $clause;
		} else {
			$this->clauses[] = $clause;
		}
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
