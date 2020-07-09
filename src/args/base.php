<?php

declare(strict_types=1);

namespace Args;

abstract class Base implements \ArrayAccess {

	public static function fromArray( array $args ) : self {
		$class = new self;

		foreach ( $args as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

	public function toArray() : array {
		$vars = get_object_vars( $this );

		$vars = array_filter( $vars, function( $value ) {
			return $value !== null;
		} );

		return $vars;
	}

	public function offsetExists( $offset ) : bool {
		return array_key_exists( $offset, get_object_vars( $this ) );
	}

	public function offsetGet( $offset ) {
		if ( ! array_key_exists( $offset, get_object_vars( $this ) ) ) {
			return null;
		}

		return $this->$offset;
	}

	public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	public function offsetUnset( $offset ) : void {
		unset( $this->$offset );
	}

}
