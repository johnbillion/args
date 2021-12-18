<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_die()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_die/
 */
class wp_die extends Shared\Base {
	/**
	 * The HTTP response code.
	 *
	 * Default 200 for Ajax requests, 500 otherwise.
	 */
	public int $response;

	/**
	 * A URL to include a link to.
	 *
	 * Only works in combination with `$link_text`.
	 *
	 * Default empty string.
	 */
	public string $link_url;

	/**
	 * A label for the link to include.
	 *
	 * Only works in combination with `$link_url`.
	 *
	 * Default empty string.
	 */
	public string $link_text;

	/**
	 * Whether to include a link to go back.
	 *
	 * Default false.
	 */
	public bool $back_link;

	/**
	 * The text direction.
	 *
	 * This is only useful internally, when WordPress is still loading and the site's locale is not set up yet. Accepts 'rtl' and 'ltr'.
	 *
	 * Default is the value of is_rtl().
	 *
	 * @phpstan-var 'rtl'|'ltr'
	 */
	public string $text_direction;

	/**
	 * Character set of the HTML output.
	 *
	 * Default 'utf-8'.
	 */
	public string $charset;

	/**
	 * Error code to use.
	 *
	 * Default is 'wp_die', or the main error code if `$message` is a `WP_Error`.
	 */
	public string $code;

	/**
	 * Whether to exit the process after completion.
	 *
	 * Default true.
	 */
	public bool $exit;
}
