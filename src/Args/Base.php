<?php

declare(strict_types=1);

namespace Args;

/**
 * @implements \ArrayAccess<mixed, mixed>
 */
abstract class Base implements \ArrayAccess {

	/**
	 * @param array<string, mixed> $args
	 */
	public static function fromArray( array $args ) : self {
		$class = new self();

		foreach ( $args as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray() : array {
		$vars = get_object_vars( $this );

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		return $vars;
	}

	/**
	 * @param int|string $offset
	 */
	public function offsetExists( $offset ) : bool {
		return array_key_exists( $offset, get_object_vars( $this ) );
	}

	/**
	 * @param int|string $offset
	 * @return mixed
	 */
	public function offsetGet( $offset ) {
		if ( ! array_key_exists( $offset, get_object_vars( $this ) ) ) {
			return null;
		}

		return $this->$offset;
	}

	/**
	 * @param int|string $offset
	 * @param mixed $value
	 */
	public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	/**
	 * @param int|string $offset
	 */
	public function offsetUnset( $offset ) : void {
		unset( $this->$offset );
	}

}
