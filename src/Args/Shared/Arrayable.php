<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments object that can be converted to an array.
 */
interface Arrayable {
	/**
	 * @return mixed[]
	 */
	public function toArray() :? array;
}
