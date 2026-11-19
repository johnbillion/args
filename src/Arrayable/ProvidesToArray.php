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
			if ( $var instanceof Arrayable ) {
				$vars[ $key ] = $var->toArray();
			} elseif ( is_array( $var ) ) {
				// Covers order values within an `orderby` array.
				$vars[ $key ] = array_map( fn( $value ) => self::sortDirectionToString( $value ), $var );
			} else {
				$vars[ $key ] = self::sortDirectionToString( $var );
			}
		}

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		ksort( $vars );

		return $vars;
	}

	/**
	 * WordPress only accepts strings for sort orders. The `SortDirection` enum exists on PHP 8.6+ only, so the enum
	 * cases must not be referenced outside of the `instanceof` check.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	private static function sortDirectionToString( $value ) {
		if ( ! $value instanceof \SortDirection ) {
			return $value;
		}

		return ( $value === \SortDirection::Ascending ) ? \Args\Shared\Base::ORDER_ASC : \Args\Shared\Base::ORDER_DESC;
	}

}
