<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * @implements \ArrayAccess<mixed, mixed>
 */
abstract class Base implements \ArrayAccess, \Countable {
	const ORDER_ASC = 'ASC';
	const ORDER_DESC = 'DESC';

	/** @var array<string, string> */
	protected $map = [];

	final public function __construct() {}

	/**
	 * @param array<string, mixed> $args
	 * @return static
	 */
	final public static function fromArray( array $args ) : self {
		$class = new static();

		foreach ( $args as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

	/**
	 * @return array<string, mixed>
	 */
	final public function toArray() : array {
		$vars = get_object_vars( $this );

		foreach ( $this->map as $from => $to ) {
			if ( array_key_exists( $from, $vars ) ) {
				$vars[ $to ] = $vars[ $from ];
				unset( $vars[ $from ] );
			}
		}

		unset( $vars['map'] );

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		return $vars;
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

}
