<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_get_abilities()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_abilities/
 */
class wp_get_abilities extends Shared\Base {
	/**
	 * Filter by category slug.
	 *
	 * Only abilities whose category exactly matches the given slug are included.
	 */
	public string $category;

	/**
	 * Filter by ability namespace prefix.
	 *
	 * Pass the namespace without a trailing slash, ie. `woocommerce` matches `woocommerce/create-order`.
	 */
	public string $namespace;

	/**
	 * Filter by meta key/value pairs.
	 *
	 * All conditions must match. Nested arrays are supported for structured meta, for example
	 * `[ 'annotations' => [ 'readonly' => true ] ]`.
	 *
	 * @var array<string, mixed>
	 */
	public array $meta;

	/**
	 * Whether to leave out abilities whose required capabilities the current user doesn't have.
	 *
	 * Abilities without required capabilities pass this check but remain subject to other filters. Permission
	 * callbacks do not run, so inclusion does not guarantee execution permission.
	 */
	public bool $has_required_capabilities;

	/**
	 * A callback invoked for each ability after the category, namespace, and meta filters.
	 *
	 * Return true to include the ability, false to exclude it.
	 *
	 * @var callable
	 * @phpstan-var callable(\WP_Ability): bool
	 */
	public $item_include_callback;

	/**
	 * A callback invoked once with all of the matched abilities.
	 *
	 * Use for sorting, slicing, or reshaping the result.
	 *
	 * @var callable
	 * @phpstan-var callable(array<string, \WP_Ability>): array<string, \WP_Ability>
	 */
	public $result_callback;
}
