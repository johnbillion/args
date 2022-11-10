<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `paginate_links()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/paginate_links/
 */
class paginate_links extends Shared\Base {
	/**
	 * Base of the paginated url.
	 *
	 * Default empty.
	 */
	public string $base;

	/**
	 * Format for the pagination structure.
	 *
	 * Default empty.
	 */
	public string $format;

	/**
	 * The total amount of pages.
	 *
	 * Default is the value WP_Query's `max_num_pages` or 1.
	 */
	public int $total;

	/**
	 * The current page number.
	 *
	 * Default is 'paged' query var or 1.
	 */
	public int $current;

	/**
	 * The value for the aria-current attribute. Possible values are 'page', 'step', 'location', 'date', 'time', 'true', 'false'.
	 *
	 * Default is 'page'.
	 *
	 * @phpstan-var 'page'|'step'|'location'|'date'|'time'|'true'|'false'
	 */
	public string $aria_current;

	/**
	 * Whether to show all pages.
	 *
	 * Default false.
	 */
	public bool $show_all;

	/**
	 * How many numbers on either the start and the end list edges.
	 *
	 * Default 1.
	 */
	public int $end_size;

	/**
	 * How many numbers to either side of the current pages.
	 *
	 * Default 2.
	 */
	public int $mid_size;

	/**
	 * Whether to include the previous and next links in the list.
	 *
	 * Default true.
	 */
	public bool $prev_next;

	/**
	 * The previous page text.
	 *
	 * Default '&laquo; Previous'.
	 */
	public string $prev_text;

	/**
	 * The next page text.
	 *
	 * Default 'Next &raquo;'.
	 */
	public string $next_text;

	/**
	 * Controls format of the returned value. Possible values are 'plain', 'array' and 'list'.
	 *
	 * Default is 'plain'.
	 */
	public string $type;

	/**
	 * An array of query args to add.
	 *
	 * Default false.
	 *
	 * @var mixed[]
	 */
	public array $add_args;

	/**
	 * A string to append to each link.
	 *
	 * Default empty.
	 */
	public string $add_fragment;

	/**
	 * A string to appear before the page number.
	 *
	 * Default empty.
	 */
	public string $before_page_number;

	/**
	 * A string to append after the page number.
	 *
	 * Default empty.
	 */
	public string $after_page_number;
}
