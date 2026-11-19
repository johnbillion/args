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

		if ( isset( $vars['order'] ) ) {
			$vars['order'] = self::sortDirectionToString( $vars['order'] );
		}

		if ( isset( $vars['orderby'] ) && is_array( $vars['orderby'] ) ) {
			$vars['orderby'] = array_map( self::sortDirectionToString( ... ), $vars['orderby'] );
		}

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		ksort( $vars );

		return $vars;
	}

	/**
	 * WordPress only accepts strings for sort orders. The `SortDirection` enum exists on PHP 8.6+ only, so the enum
	 * cases must not be referenced outside of the `instanceof` check.
	 *
	 * @template T
	 * @param T $value
	 * @return (T is \SortDirection ? \Args\Shared\Base::ORDER_* : T)
	 */
	private static function sortDirectionToString( mixed $value ) : mixed {
		if ( ! $value instanceof \SortDirection ) {
			return $value;
		}

		return ( $value === \SortDirection::Ascending ) ? \Args\Shared\Base::ORDER_ASC : \Args\Shared\Base::ORDER_DESC;
	}

}
