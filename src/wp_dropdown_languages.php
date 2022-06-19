<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_dropdown_languages()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_dropdown_languages/
 */
class wp_dropdown_languages extends Shared\Base {
	/**
	 * ID attribute of the select element.
	 *
	 * Default 'locale'.
	 */
	public string $id;

	/**
	 * Name attribute of the select element.
	 *
	 * Default 'locale'.
	 */
	public string $name;

	/**
	 * List of installed languages, contain only the locales.
	 *
	 * Default empty array.
	 *
	 * @var mixed[]
	 */
	public array $languages;

	/**
	 * List of available translations.
	 *
	 * Default result of wp_get_available_translations().
	 *
	 * @var mixed[]
	 */
	public array $translations;

	/**
	 * Language which should be selected.
	 *
	 * Default empty.
	 */
	public string $selected;

	/**
	 * Whether to echo the generated markup.
	 *
	 * Default true.
	 */
	public bool $echo;

	/**
	 * Whether to show available translations.
	 *
	 * Default true.
	 */
	public bool $show_available_translations;

	/**
	 * Whether to show an option to fall back to the site's locale.
	 *
	 * Default false.
	 */
	public bool $show_option_site_default;

	/**
	 * Whether to show an option for English (United States).
	 *
	 * Default true.
	 */
	public bool $show_option_en_us;

	/**
	 * Whether the English (United States) option uses an explicit value of en_US instead of an empty value.
	 *
	 * Default true.
	 */
	public bool $explicit_option_en_us;
}
