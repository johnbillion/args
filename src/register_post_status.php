<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `register_post_status()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_status/
 */
class register_post_status extends Shared\Base {
	/**
	 * A descriptive name for the post status marked for translation.
	 *
	 * Defaults to value of `$post_status`.
	 */
	public string $label;

	/**
	 * Descriptive text to use for nooped plurals.
	 *
	 * Default array of `$label`, twice.
	 *
	 * @var mixed[]
	 */
	public array $label_count;

	/**
	 * Whether to exclude posts with this post status from search results.
	 *
	 * Default is value of `$internal`.
	 */
	public bool $exclude_from_search;

	/**
	 * FOR INTERNAL USE ONLY! Whether the status is built-in.
	 *
	 * Default false.
	 */
	protected bool $_builtin;

	/**
	 * Whether posts of this status should be shown in the front end of the site.
	 *
	 * Default false.
	 */
	public bool $public;

	/**
	 * Whether the status is for internal use only.
	 *
	 * Default false.
	 */
	public bool $internal;

	/**
	 * Whether posts with this status should be protected.
	 *
	 * Default false.
	 */
	public bool $protected;

	/**
	 * Whether posts with this status should be private.
	 *
	 * Default false.
	 */
	public bool $private;

	/**
	 * Whether posts with this status should be publicly-queryable.
	 *
	 * Default is value of `$public`.
	 */
	public bool $publicly_queryable;

	/**
	 * Whether to include posts in the edit listing for their post type.
	 *
	 * Default is the opposite value of `$internal`.
	 */
	public bool $show_in_admin_all_list;

	/**
	 * Show in the list of statuses with post counts at the top of the edit listings, e.g. All (12) | Published (9) | My Custom Status (2)
	 *
	 * Default is the opposite value of `$internal`.
	 */
	public bool $show_in_admin_status_list;

	/**
	 * Whether the post has a floating creation date.
	 *
	 * Default `false`.
	 */
	public bool $date_floating;
}
