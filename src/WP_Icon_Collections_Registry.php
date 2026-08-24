<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Icon_Collections_Registry::register()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_icon_collections_registry/register/
 */
class WP_Icon_Collections_Registry extends Shared\Base {
	/**
	 * A human-readable label for the icon collection.
	 *
	 * Required.
	 */
	public string $label;

	/**
	 * A human-readable description for the icon collection.
	 */
	public string $description;
}
