<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_get_icon()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_icon/
 */
class wp_get_icon extends Shared\Base {
	/**
	 * Width and height in pixels.
	 *
	 * Pass null to leave the SVG's intrinsic dimensions untouched.
	 *
	 * Default 24.
	 *
	 * @phpstan-var positive-int|null
	 */
	public int|null $size;

	/**
	 * Additional CSS class names.
	 *
	 * Multiple classes may be provided as a space-separated string.
	 *
	 * Default empty string.
	 */
	public string $class;

	/**
	 * Accessible label.
	 *
	 * If provided, the SVG gets `role="img"` and `aria-label`. If omitted, the SVG gets
	 * `aria-hidden="true"` and `focusable="false"`.
	 *
	 * Default empty string.
	 */
	public string $label;
}
