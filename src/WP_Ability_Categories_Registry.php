<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Ability_Categories_Registry::register()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_ability_categories_registry/register/
 */
class WP_Ability_Categories_Registry extends Shared\Base {
	/**
	 * The human-readable label for the ability category.
	 */
	public string $label;

	/**
	 * A description of the ability category.
	 */
	public string $description;

	/**
	 * Additional metadata for the ability category.
	 *
	 * @var array<string, mixed>
	 */
	public array $meta;
}
