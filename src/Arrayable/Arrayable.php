<?php

declare(strict_types=1);

namespace Args\Arrayable;

/**
 * Arguments object that can be converted to an array.
 */
interface Arrayable {
	/**
	 * @return ?array<string|int,mixed>
	 */
	public function toArray() :? array;
}
