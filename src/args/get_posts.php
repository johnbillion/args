<?php

declare(strict_types=1);

namespace Args;

class get_posts extends WP_Query {

	/**
	 * Total number of posts to retrieve. Is an alias of $posts_per_page in WP_Query. Accepts -1 for all. Default 5.
	 *
	 * @var int
	 */
	public int $numberposts;

	/**
	 * Category ID or comma-separated list of IDs (this or any children). Is an alias of $cat in WP_Query. Default 0.
	 *
	 * @var int|string
	 */
	public $category;

	/**
	 * An array of post IDs to retrieve, sticky posts will be included. Is an alias of $post__in in WP_Query. Default empty array.
	 *
	 * @var array
	 */
	public array $include;

	/**
	 * An array of post IDs not to retrieve. Default empty array.
	 *
	 * @var array
	 */
	public array $exclude;

	/**
	 * Whether to suppress filters. Default true.
	 *
	 * @var bool
	 */
	public bool $suppress_filters;

}
