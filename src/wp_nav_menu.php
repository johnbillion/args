<?php

declare(strict_types=1);

namespace Args;

use Walker;
use WP_Term;

/**
 * Arguments for the `wp_nav_menu()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
class wp_nav_menu extends Shared\Base {
	/**
	 * Desired menu. Accepts a menu ID, slug, name, or object.
	 *
	 * Default empty.
	 *
	 * @var int|string|WP_Term
	 */
	public $menu;

	/**
	 * CSS class to use for the ul element which forms the menu.
	 *
	 * Default 'menu'.
	 */
	public string $menu_class;

	/**
	 * The ID that is applied to the ul element which forms the menu.
	 *
	 * Default is the menu slug, incremented.
	 */
	public string $menu_id;

	/**
	 * Whether to wrap the ul, and what to wrap it with.
	 *
	 * Default 'div'.
	 */
	public string $container;

	/**
	 * Class that is applied to the container.
	 *
	 * Default 'menu-{menu slug}-container'.
	 */
	public string $container_class;

	/**
	 * The ID that is applied to the container.
	 *
	 * Default empty.
	 */
	public string $container_id;

	/**
	 * The aria-label attribute that is applied to the container when it's a nav element.
	 *
	 * Default empty.
	 */
	public string $container_aria_label;

	/**
	 * If the menu doesn't exist, a callback function will fire.
	 *
	 * Default is 'wp_page_menu'. Set to false for no fallback.
	 *
	 * @var callable|false
	 * @phpstan-var (callable(mixed[]): (string|void))|false
	 */
	public $fallback_cb;

	/**
	 * Text before the link markup.
	 *
	 * Default empty.
	 */
	public string $before;

	/**
	 * Text after the link markup.
	 *
	 * Default empty.
	 */
	public string $after;

	/**
	 * Text before the link text.
	 *
	 * Default empty.
	 */
	public string $link_before;

	/**
	 * Text after the link text.
	 *
	 * Default empty.
	 */
	public string $link_after;

	/**
	 * Whether to echo the menu or return it.
	 *
	 * Default true.
	 */
	public bool $echo;

	/**
	 * How many levels of the hierarchy are to be included. 0 means all.
	 *
	 * Default 0.
	 */
	public int $depth;

	/**
	 * Instance of a custom walker class.
	 *
	 * Default empty.
	 *
	 * @var Walker
	 */
	public object $walker;

	/**
	 * Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
	 */
	public string $theme_location;

	/**
	 * How the list items should be wrapped. Uses printf() format with numbered placeholders.
	 *
	 * Default is a ul with an id and class.
	 */
	public string $items_wrap;

	/**
	 * Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'.
	 *
	 * Default 'preserve'.
	 *
	 * @phpstan-var 'preserve'|'discard'
	 */
	public string $item_spacing;
}
