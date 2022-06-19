<?php

declare(strict_types=1);

namespace Args;

use WP_Term;

/**
 * Arguments for the `$args` parameter of the `wp_generate_tag_cloud()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_generate_tag_cloud/
 */
class wp_generate_tag_cloud extends Shared\Base {
	/**
	 * Smallest font size used to display tags.
	 *
	 * Paired with the value of `$unit`, to determine CSS text size unit.
	 *
	 * Default 8 (pt).
	 */
	public int $smallest;

	/**
	 * Largest font size used to display tags.
	 *
	 * Paired with the value of `$unit`, to determine CSS text size unit.
	 *
	 * Default 22 (pt).
	 */
	public int $largest;

	/**
	 * CSS text size unit to use with the `$smallest` and `$largest` values.
	 *
	 * Accepts any valid CSS text size unit.
	 *
	 * Default 'pt'.
	 */
	public string $unit;

	/**
	 * The number of tags to return.
	 *
	 * Accepts any positive integer or zero to return all.
	 *
	 * Default 0.
	 *
	 * @phpstan-var positive-int | 0
	 */
	public int $number;

	/**
	 * Format to display the tag cloud in.
	 *
	 * Accepts 'flat' (tags separated with spaces), 'list' (tags displayed in an unordered list), or 'array' (returns an array).
	 *
	 * Default 'flat'.
	 */
	public string $format;

	/**
	 * HTML or text to separate the tags.
	 *
	 * Default "\n" (newline).
	 */
	public string $separator;

	/**
	 * Value to order tags by.
	 *
	 * Accepts 'name' or 'count'.
	 *
	 * The {@see 'tag_cloud_sort'} filter can also affect how tags are sorted.
	 *
	 * Default 'name'.
	 */
	public string $orderby;

	/**
	 * How to order the tags.
	 *
	 * Accepts 'ASC' (ascending), 'DESC' (descending), or 'RAND' (random).
	 *
	 * Default 'ASC'.
	 *
	 * @phpstan-var 'ASC'|'DESC'|'RAND'
	 */
	public string $order;

	/**
	 * Whether to enable filtering of the final output via {@see 'wp_generate_tag_cloud'}.
	 *
	 * Default true.
	 */
	public bool $filter;

	/**
	 * Nooped plural text from _n_noop() to supply to tag counts.
	 *
	 * Default null.
	 *
	 * @var mixed[]
	 */
	public array $topic_count_text;

	/**
	 * Callback used to generate nooped plural text for tag counts based on the count.
	 *
	 * Default null.
	 *
	 * @var callable
	 * @phpstan-var callable(int,WP_Term,mixed[]): int
	 */
	public $topic_count_text_callback;

	/**
	 * Callback used to determine the tag count scaling value.
	 *
	 * Default default_topic_count_scale().
	 *
	 * @var callable
	 * @phpstan-var callable(int): int
	 */
	public $topic_count_scale_callback;

	/**
	 * Whether to display the tag counts.
	 *
	 * Default false.
	 */
	public bool $show_count;
}
