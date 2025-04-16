<?php

declare(strict_types=1);

namespace Args\Arrayable;

/**
 * An arguments object which provides a vanilla `toArray()` method.
 */
trait ProvidesToArray {
	/**
	 * @return array<string, string>
	 */
	public function getMap() : array {
		return [];
	}

	/**
	 * @return array<string,mixed>
	 */
	final public function toArray() : array {
		$vars = get_object_vars( $this );

		foreach ( $this->getMap() as $from => $to ) {
			if ( array_key_exists( $from, $vars ) ) {
				$vars[ $to ] = $vars[ $from ];
				unset( $vars[ $from ] );
			}
		}

		foreach ( $vars as $key => $var ) {
			if ( ! $var instanceof Arrayable ) {
				continue;
			}

			$vars[ $key ] = $var->toArray();
		}

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		ksort( $vars );

		return $vars;
	}

}
