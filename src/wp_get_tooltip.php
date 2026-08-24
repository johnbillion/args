<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_get_tooltip()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_tooltip/
 */
class wp_get_tooltip extends Shared\Base {
	/**
	 * Unique ID for the popover element.
	 *
	 * Default is a generated unique ID.
	 */
	public string $id;

	/**
	 * Existing `button` markup, or `a` markup for tooltips.
	 *
	 * Used instead of the generated button.
	 *
	 * Default standard button HTML.
	 */
	public string $button;

	/**
	 * Accessible label for the toggle button.
	 *
	 * Not used for tooltips.
	 *
	 * Default 'Help', matching the default icon.
	 */
	public string $label;

	/**
	 * Accessible label for the close button.
	 *
	 * Not used for tooltips.
	 *
	 * Default 'Close'.
	 */
	public string $close_label;

	/**
	 * Dashicons icon class for the toggle button.
	 *
	 * Should match the control's visible label.
	 *
	 * Default 'dashicons-editor-help'.
	 */
	public string $icon;

	/**
	 * Additional class(es) for the wrapping element.
	 *
	 * Default empty.
	 */
	public string $class;
}
