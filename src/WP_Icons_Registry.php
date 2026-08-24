<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Icons_Registry::register()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_icons_registry/register/
 */
class WP_Icons_Registry extends Shared\Base {
	/**
	 * A human-readable label for the icon.
	 *
	 * Required.
	 */
	public string $label;

	/**
	 * SVG markup for the icon.
	 *
	 * If not provided, the content will be retrieved from the `file_path` if set. If
	 * neither `content` nor `file_path` are set then the icon will not be registered.
	 */
	public string $content;

	/**
	 * The full path to the file containing the icon content.
	 */
	public string $file_path;
}
