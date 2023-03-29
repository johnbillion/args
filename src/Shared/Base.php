<?php

declare(strict_types=1);

namespace Args\Shared;

use Args\Arrayable\Arrayable;

/**
 * @implements \ArrayAccess<string, mixed>
 * @implements \IteratorAggregate<string, mixed>
 */
abstract class Base implements \ArrayAccess, \Countable, \IteratorAggregate, Arrayable {
	public const ORDER_ASC = 'ASC';
	public const ORDER_DESC = 'DESC';

	use \Args\Arrayable\ProvidesFromArray;
	use \Args\Arrayable\ProvidesToArray;

	final public function __construct() {
		if ( $this instanceof \Args\DateQuery\WithArgs ) {
			$this->setDateQuery( new \Args\DateQuery\Query );
		}
		if ( $this instanceof \Args\MetaQuery\WithArgs ) {
			$this->setMetaQuery( new \Args\MetaQuery\Query );
		}
		if ( $this instanceof \Args\TaxQuery\WithArgs ) {
			$this->setTaxQuery( new \Args\TaxQuery\Query );
		}
	}

	/**
	 * @param mixed $offset
	 */
	#[\ReturnTypeWillChange]
	final public function offsetExists( $offset ) : bool {
		if ( ! is_string( $offset ) ) {
			return false;
		}

		return array_key_exists( $offset, get_object_vars( $this ) );
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	#[\ReturnTypeWillChange]
	final public function offsetGet( $offset ) {
		if ( ! is_string( $offset ) ) {
			return null;
		}

		if ( ! array_key_exists( $offset, get_object_vars( $this ) ) ) {
			return null;
		}

		return $this->$offset;
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	#[\ReturnTypeWillChange]
	final public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	/**
	 * @param mixed $offset
	 */
	#[\ReturnTypeWillChange]
	final public function offsetUnset( $offset ) : void {
		unset( $this->$offset );
	}

	final public function count() : int {
		return count( $this->toArray() );
	}

	final public function getIterator() : \Traversable {
		return new \ArrayIterator( $this->toArray() );
	}
}
