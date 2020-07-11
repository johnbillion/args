<?php

declare(strict_types=1);

namespace Args;

/**
 * @property int $numberposts Total number of posts to retrieve. Is an alias of $posts_per_page in WP_Query. Accepts -1 for all. Default 5.
 * @property int|string $category Category ID or comma-separated list of IDs (this or any children). Is an alias of $cat in WP_Query. Default 0.
 * @property int[]|string[] $include An array of post IDs to retrieve, sticky posts will be included. Is an alias of $post__in in WP_Query. Default empty array.
 * @property int[]|string[] $exclude An array of post IDs not to retrieve. Default empty array.
 * @property bool $suppress_filters Whether to suppress filters. Default true.
 */
class get_posts extends WP_Query {
}
