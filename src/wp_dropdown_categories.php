<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_dropdown_categories()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_dropdown_categories/
 */
class wp_dropdown_categories extends WP_Term_Query {
	/**
	 * The 'id' of an element that contains descriptive text for the select.
	 *
	 * Default empty.
	 */
	public string $aria_describedby;

	/**
	 * Text to display for showing all categories.
	 *
	 * Default empty.
	 */
	public string $show_option_all;

	/**
	 * Text to display for showing no categories.
	 *
	 * Default empty.
	 */
	public string $show_option_none;

	/**
	 * Value to use when no category is selected.
	 *
	 * Default empty.
	 */
	public string $option_none_value;

	/**
	 * Whether to include post counts.
	 *
	 * Default false.
	 */
	public bool $show_count;

	/**
	 * Whether to echo or return the generated markup.
	 *
	 * Default true.
	 */
	public bool $echo;

	/**
	 * Maximum depth.
	 *
	 * Default 0.
	 */
	public int $depth;

	/**
	 * Tab index for the select element.
	 *
	 * Default 0 (no tabindex).
	 */
	public int $tab_index;

	/**
	 * Value for the 'id' attribute of the select element.
	 *
	 * Defaults to the value of `$name`.
	 */
	public string $id;

	/**
	 * Value for the 'class' attribute of the select element.
	 *
	 * Default 'postform'.
	 */
	public string $class;

	/**
	 * Value of the option that should be selected.
	 *
	 * Default 0.
	 *
	 * @var int|string
	 */
	public $selected;

	/**
	 * Term field that should be used to populate the 'value' attribute of the option elements.
	 *
	 * Accepts any valid term field: 'term_id', 'name', 'slug', 'term_group', 'term_taxonomy_id', 'taxonomy', 'description', 'parent', 'count'.
	 *
	 * Default 'term_id'.
	 */
	public string $value_field;

	/**
	 * True to skip generating markup if no categories are found.
	 *
	 * Default false (create select element even if no categories are found).
	 */
	public bool $hide_if_empty;

	/**
	 * Whether the `<select>` element should have the HTML5 'required' attribute.
	 *
	 * Default false.
	 */
	public bool $required;

	/**
	 * Walker object to use to build the output.
	 *
	 * Default empty which results in a `Walker_CategoryDropdown` instance being used.
	 *
	 * @var \Walker
	 */
	public $walker;
}
