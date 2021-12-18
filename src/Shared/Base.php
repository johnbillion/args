<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * @implements \ArrayAccess<string, mixed>
 * @implements \IteratorAggregate<string, mixed>
 */
abstract class Base implements \ArrayAccess, \Countable, \IteratorAggregate, Arrayable {
	const ORDER_ASC = 'ASC';
	const ORDER_DESC = 'DESC';

	use ProvidesFromArray;
	use ProvidesToArray;

	final public function __construct() {
		if ( $this instanceof WithDateQueryArgs ) {
			$this->setDateQuery( new DateQuery );
		}
		if ( $this instanceof WithMetaQueryArgs ) {
			$this->setMetaQuery( new MetaQuery );
		}
		if ( $this instanceof WithTaxQueryArgs ) {
			$this->setTaxQuery( new TaxQuery );
		}
	}

	/**
	 * @param mixed $offset
	 */
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
	final public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	/**
	 * @param mixed $offset
	 */
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
