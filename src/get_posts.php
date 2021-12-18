<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `get_posts()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/get_posts/
 * @link https://developer.wordpress.org/reference/classes/wp_query/parse_query/
 */
class get_posts extends WP_Query {

	/**
	 * Total number of posts to retrieve. Is an alias of `$posts_per_page` in `WP_Query`.
	 *
	 * Accepts -1 for all.
	 *
	 * Default 5.
	 *
	 * @phpstan-var positive-int|-1
	 */
	public int $numberposts;

	/**
	 * Category ID or comma-separated list of IDs (this or any children). Is an alias of `$cat` in `WP_Query`.
	 *
	 * Default 0.
	 *
	 * @var int|string
	 */
	public $category;

	/**
	 * An array of post IDs to retrieve, sticky posts will be included. Is an alias of `$post__in` in `WP_Query`.
	 *
	 * Default empty array.
	 *
	 * @var array<int, int>
	 */
	public array $include;

	/**
	 * An array of post IDs not to retrieve.
	 *
	 * Default empty array.
	 *
	 * @var array<int, int>
	 */
	public array $exclude;

	/**
	 * Whether to suppress filters.
	 *
	 * Default true.
	 */
	public bool $suppress_filters;

}
