<?php

declare(strict_types=1);

namespace Args\Arrayable;

/**
 * An arguments object which provides a vanilla `fromArray()` method.
 */
trait ProvidesFromArray {
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

}
