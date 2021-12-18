<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `$args` parameter of the `wp_update_term()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_update_term/
 */
class wp_update_term extends Shared\Base {
	/**
	 * Slug of the term to make this term an alias of. Accepts a term slug.
	 *
	 * Default empty string.
	 *
	 */
	public string $alias_of;

	/**
	 * The term description.
	 *
	 * Default empty string.
	 */
	public string $description;

	/**
	 * The id of the parent term.
	 *
	 * Default 0.
	 */
	public int $parent;

	/**
	 * The term slug to use.
	 *
	 * Default empty string.
	 */
	public string $slug;
}
