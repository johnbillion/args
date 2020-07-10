<?php

declare(strict_types=1);

namespace Args;

/**
 * @implements \ArrayAccess<mixed, mixed>
 */
abstract class Base implements \ArrayAccess {

	/**
	 * @param array<mixed, mixed> $args
	 */
	public static function fromArray( array $args ) : self {
		$class = new self();

		foreach ( $args as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

	/**
	 * @return array<mixed, mixed>
	 */
	public function toArray() : array {
		$vars = get_object_vars( $this );

		$vars = array_filter( $vars, function( $value ) {
			return $value !== null;
		} );

		return $vars;
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetExists( $offset ) : bool {
		return array_key_exists( $offset, get_object_vars( $this ) );
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet( $offset ) {
		if ( ! array_key_exists( $offset, get_object_vars( $this ) ) ) {
			return null;
		}

		return $this->$offset;
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset( $offset ) : void {
		unset( $this->$offset );
	}

}
